<?php
/**
 * 发送邮件控制器
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-18
 * Time: 上午10:39
 */
namespace app\index\controller;

use app\index\model\Blacklist;
use app\index\model\SendConfig;
use app\index\model\SendError;
use app\index\model\UnsendMail;
use think\Config;
use think\Controller;
use think\Request;
use app\index\model\Account;
use app\index\model\Template;
use app\common\controller\EmailUtil;
use app\index\model\SendRecord;
use think\Url;
use app\index\controller\Unsubscribeemail;

class Sendemail extends Controller
{
    /**
     * 启动函数 接收参数
     * @param $id
     */
    public function run($id)
    {
        if (empty($id)) {
            exit("请传入id参数");
        }
        $this->openObStart();
        //根据id查询配置项
        $sendconfig = SendConfig::get($id);
        if (!$sendconfig) {
            exit("无此配置项");
        }
        $confgData = $sendconfig->toArray();
        //文件枷锁
        if (file_exists("number.lock")) {
            $modify_time = filemtime("number.lock");
            $change_time = time() - $modify_time;
            if ($change_time < 100) {
                exit;
            }
        }
        $this->begin($confgData);
    }

    /**
     * 开启发送
     * @param $confgData
     */
    public function begin($confgData)
    {
        //实例化email类
        $emailUtil = new EmailUtil();
        //获取账号信息
        $account_arr = $this->getAccount();
        //获取mongodb实例
        $mongodb = new \app\index\model\Mongodb();
        //账号起始
        $start_account = $confgData["send_account_id"];
        //邮箱发送起始
        $email_offset = $confgData["send_record_page"];
        //获取模板信息
        if (empty($confgData["template_id"])) {
            exit("请先配置模板");
        }
        $template_arr = $this->getTemplate($confgData["template_id"]);
        //总记录数
        $count=$this->getCount($mongodb,$confgData);
        //如果配置项是空 修改默认配置项
        if (empty($confgData["count"])) {
            $this->saveCount($count, $confgData["id"]);
        }
        while (1) {
            file_put_contents("number.lock", $email_offset);
            //如果账号发送到最后一个 开始循环
            if ($start_account >= $account_arr["count"]) {
                $start_account = 0;
            }
            //判断是否发送完毕
            if ($email_offset >= $count) {
                exit("数据已经发送完毕,无法再次发送,请重新修改配置");
            }
            //1条数据
            $data =$this->getData($mongodb,$confgData,$email_offset,1);
            $toUser = $data[0]["person_mailaddress"];
            //模板信息数组
            $tempInfo = $template_arr[array_rand($template_arr)];
            //账号
            $sendUser = $account_arr["data"][$start_account]["account"];
            //账号密码
            $sendpwd = $account_arr["data"][$start_account]["pwd"];
            //hosts
            $hosts = $account_arr["data"][$start_account]["hosts"];
            //主题
            $subject = $tempInfo["title"];
            //内容
            $sendBody = $tempInfo["content"];
            //匹配域名黑名单
            if (!empty($this->matchBlackList($toUser))) {
                (new SendError())->add($sendUser, $toUser, "域名黑名单", $tempInfo["id"]);
                //更改配置
                ++$start_account;
                ++$email_offset;
                $this->editConfig($confgData["id"], $start_account, $email_offset, $sendUser);
                continue;
            }
            //匹配邮箱黑名单
            if (!empty($this->matchUnsendEmail($toUser))) {
                (new SendError())->add($sendUser, $toUser, "邮箱黑名单", $tempInfo["id"]);
                //更改配置
                ++$start_account;
                ++$email_offset;
                $this->editConfig($confgData["id"], $start_account, $email_offset, $sendUser);
                continue;
            }
            //匹配是否本配置下已发送
            if (!empty($this->filterRepeatEmail($toUser, $confgData["id"]))) {
                (new SendError())->add($sendUser, $toUser, "邮箱重复", $tempInfo["id"]);
                //更改配置
                ++$start_account;
                ++$email_offset;
                $this->editConfig($confgData["id"], $start_account, $email_offset, $sendUser);
                continue;
            }
            //添加发送记录
            $recordId = $this->saveRecord($tempInfo,$toUser,$confgData,$data);
            ++$start_account;
            ++$email_offset;
            //修改发送记录
            $this->editConfig($confgData["id"], $start_account, $email_offset, $sendUser);
            //替换发送内容
            $sendInfo = $this->replaceContent($data[0]["registrant_name"], $subject, $sendBody, $recordId, $data[0]["domain"]);
            //加密md5串
            $md5_str = md5($toUser . "registrant_name");
            //在最后添加图片和退订
            $sendInfo[1] = $sendInfo[1] . "\n <img width='1' height='1' src='" . $sendInfo[2] . "'>\n" . (new Unsubscribeemail)->makeUnsubscribeEmail($recordId, $toUser, $md5_str);
            $emailUtil->phpmailerSend($sendUser, $sendpwd, $sendInfo[0], $toUser, $sendInfo[1], $confgData["fromname"],$hosts);
            if(strpos($sendUser,"admin")===0){
                sleep(31);
            }
            if(!empty($data[0]["qiye_mailaddress"])){
                //添加发送记录
                $recordId = $this->saveRecord($tempInfo,$data[0]["qiye_mailaddress"],$confgData,$data);
                $emailUtil->phpmailerSend($sendUser, $sendpwd, $sendInfo[0], $data[0]["qiye_mailaddress"], $sendInfo[1], $confgData["fromname"],$hosts);
            }

        }
    }

    /**
     * 根据条件获取数据 从mongodb或record中获取
     * @param $mongodb
     * @param $confgData
     * @param $email_offset
     * @param $rows
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getData($mongodb,$confgData,$email_offset,$rows)
    {
        if (empty($confgData["parent_id"])) {
            $data = $mongodb->getPerstepEmail($confgData["province_id"],$confgData["brand_id"],$confgData["config_type"],$email_offset,$rows);
        } else {
            $where["config_id"] = $confgData["parent_id"];
            $where["read_num"] = [
                "egt", $confgData["select_number"]
            ];
            $data = (new SendRecord())->where($where)->select();
        }
        return $data;
    }


    /**
     * 获取数据总数 区分是从mongodb获取还是record中提取
     * @param $mongodb
     * @param $confgData
     * @return int|string
     */
    public function getCount($mongodb,$confgData)
    {
        //总记录数
        if (empty($confgData["parent_id"])) {
            $count = $mongodb->getCount($confgData["province_id"],$confgData["brand_id"],$confgData["config_type"]);
        } else {
            $where["config_id"] = $confgData["parent_id"];
            $where["read_num"] = [
                "egt", $confgData["select_number"]
            ];
            $count = (new SendRecord())->where($where)->count();
        }
        return $count;
    }

    /**
     * 修改config发送配置
     * @param $configId
     * @param $start_account
     * @param $email_offset
     * @param $sendUser
     */
    public function editConfig($configId, $start_account, $email_offset, $sendUser)
    {
        $sconfig = SendConfig::get($configId);
        $sconfig->send_record_page = $email_offset;
        $sconfig->send_account_id = $start_account;
        $sconfig->send_account_name = $sendUser;
        $sconfig->save();
    }

    /**
     * 匹配不发送邮箱
     * @param $email
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function matchUnsendEmail($email)
    {
        return (new UnsendMail())->where(["email" => $email])->find();
    }

    /**
     * 域名黑名单匹配
     * @param $email
     * @return bool
     */
    public function matchBlackList($email)
    {
        $arr = explode("@", $email);
        $where["domain"] =$arr[1];
        return (new Blacklist())->where($where)->find();
    }

    /**
     * 添加发送记录
     * @param $template_id
     * @param $template_name
     * @param $toUser
     * @param $configId
     * @param $configTitle
     * @param $province
     * @param $object_id
     * @return false|int
     */
    public function saveRecord($template_arr,$toUser, $config_arr,$data)
    {
        $model = new SendRecord();
        $model->template_id = $template_arr["id"];
        $model->template_title = $template_arr["title"];
        $model->template_type = $template_arr["type"];
        $model->email = $toUser;
        $model->config_id = $config_arr["id"];
        $model->config_title = $config_arr["title"];
        $model->province = $config_arr["province_id"];
        $model->object_id = $data[0]["object_id"];
        $model->domain=$data[0]["domain"];
        $model->wwwtitle=$data[0]["wwwtitle"];
        $model->save();
        return $model->id;
    }

    /**
     * 替换内容
     * @param $data
     * @param $template_info
     * @param $record_add_id
     * @return string
     */
    public function replaceContent($registrant_name, $title, $content, $recordId, $domain)
    {
        //随机字符串
//        $rand_abc = chr(rand(97, 122)) . chr(rand(65, 90)) . chr(rand(97, 122)) . chr(rand(65, 90));
        if (empty($registrant_name)) {
            $registrant_name = "您好";
        }
        //标题
        $rtitle = str_replace("{{name}}", $registrant_name, $title) . "(" . $domain . ")";
        //内容
        $rcontent = str_replace("{{name}}", $registrant_name, $content);
        //替换链接id
        $rcontent = str_replace("{{id}}", $recordId, $rcontent);
        //图片链接地址
        $domain = Config::get("emailDomain.domain");
        $url = $domain . Url::build("Unsubscribeemail/makeDetectImg", "id=$recordId");
        return [
            $rtitle, $rcontent, $url
        ];
    }

    /**
     * 获取所有模板信息
     * @param $id
     * @return array
     */
    public function getTemplate($id)
    {
        $temp = Template::all(trim($id, ","));
        return collection($temp)->toArray();
    }


    /**
     * 获取账号相关数据
     * @return array
     */
    public function getAccount()
    {
        $count = Account::count();
        if (empty($count)) {
            exit("请先添加账号");
        }
        $acc = Account::all();
        $data = collection($acc)->toArray();
        return [
            "count" => $count,
            "data" => $data
        ];
    }

    /**
     * 修改count
     * @param $count
     * @param $id
     */
    public function saveCount($count, $id)
    {
        $sendconfig = SendConfig::get($id);
        $sendconfig->count = $count;
        $sendconfig->save();
    }

    /**
     * 开启缓冲区并刷新数据到前台
     */
    public function openObStart()
    {
        ignore_user_abort(true);//在关闭连接后，继续运行php脚本
        /******** background process ********/
        set_time_limit(0); //no time limit，不设置超时时间（根据实际情况使用）
    }

    /**
     * 根据当前发送配置过滤
     * @param $email
     * @param $config_id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function filterRepeatEmail($email, $config_id)
    {
        $where["config_id"] = $config_id;
        $where["email"] = $email;
        return (new SendRecord())->where($where)->find();
    }
}