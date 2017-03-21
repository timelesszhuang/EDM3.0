<?php
/**
 * 发送邮件控制器
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-18
 * Time: 上午10:39
 */
namespace app\index\controller;

use app\index\model\SendConfig;
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
        $this->begin($confgData);
    }

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
        $count = $mongodb->getCount($confgData["province_id"], $confgData["brand_id"]);
        //如果配置项是空 修改默认配置项
        if (empty($confgData["count"])) {
            $this->saveCount($count, $confgData["id"]);
        }
        while (1) {
            //如果账号发送到最后一个 开始循环
            if ($start_account >= $account_arr["count"]) {
                $start_account = 0;
            }
            if ($email_offset >= $count) {
                exit("数据已经发送完毕,无法再次发送,请重新修改配置");
            }
            //500条数据
            $data = $mongodb->getPerstepEmail($confgData["province_id"], $confgData["brand_id"], $email_offset, 500);
            foreach ($data as $dk => $dv) {
                $toUser = $dv["person_mailaddress"];
                $toUser="guozhen@qiangbi.net";
                //添加发送记录
//                var_dump($dv);die;
                $recordId = $this->saveRecord($confgData["template_id"], $confgData["template_name"], $toUser, $confgData["id"], $confgData["title"], $confgData["province_id"], $dv["object_id"]);
//                var_dump($recordId);die;
                //模板信息数组
                $tempInfo = $template_arr[array_rand($template_arr)];
                $sendUser = $account_arr["data"][$start_account]["account"];
                $sendpwd = $account_arr["data"][$start_account]["pwd"];
                $subject = $tempInfo["title"];
                $sendName = "强比企业邮箱";
                $sendBody = $tempInfo["content"];
                //替换发送内容
                $sendInfo = $this->replaceContent($dv["registrant_name"], $subject, $sendBody, $recordId,$dv["domain"]);
//                var_dump($sendInfo);die;
                //加密md5串
                $md5_str = md5($toUser."registrant_name");
                //在最后添加图片和退订
                $sendInfo[1] = $sendInfo[1] . "\n <img width='1' height='1' src='" . $sendInfo[2] . "'>\n" .(new Unsubscribeemail)->unsubscribeEmail($recordId,$toUser,$md5_str);
                var_dump($sendUser);die;
                $emailUtil->phpmailerSend($sendUser, $sendpwd, $sendInfo[0], $toUser, $sendName, $sendInfo[1]);die;
                //账号和邮箱step++
                $start_account++;
                $email_offset++;
            }
        }
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
    public function saveRecord($template_id, $template_name, $toUser, $configId, $configTitle, $province, $object_id)
    {
        $model = new SendRecord();
        $model->template_id = $template_id;
        $model->template_title = $template_name;
        $model->email = $toUser;
        $model->config_id = $configId;
        $model->config_title = $configTitle;
        $model->province = $province;
        $model->object_id = $object_id;
        return $model->save();
    }

    /**
     * 替换内容
     * @param $data
     * @param $template_info
     * @param $record_add_id
     * @return string
     */
    public function replaceContent($registrant_name, $title, $content, $recordId,$domain)
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
        $url = $domain . Url::build("EmailUtil/makeDetectImg", "id=$recordId");
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
        $temp = Template::all(trim($id,","));
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

    //根据当前发送配置过滤
    public function filterRepeatEmail()
    {

    }
}