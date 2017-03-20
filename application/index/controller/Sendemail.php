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
use think\Controller;
use think\Request;
use app\index\model\Account;
use app\index\model\Template;
class Sendemail extends Controller
{
    /**
     * 启动函数 接收参数
     * @param $id
     */
    public function run($id)
    {
//        $mongodb = new \app\index\model\Mongodb();
//        $list = $mongodb->getPerstepEmail('shandong', 6, 0, 500);
//        echo $mongodb->getCount('shandong', 6);
//        print_r($list);
//        exit;
        if (empty($id)) {
            exit("请传入id参数");
        }
        $this->open_ob_start();
        //根据id查询配置项
        $sendconfig = SendConfig::get($id);
        if (!$sendconfig) {
            exit("无此配置项");
        }
        $confgData = $sendconfig->toArray();
        //获取模板信息
        if(empty($confgData["template_id"])){
            exit("请先配置模板");
        }
        $template=Template::get($confgData["template_id"]);
        if(!$template){
            exit("没有模板数据");
        }
        $templateData=$template->toArray();
        $this->begin($confgData,$templateData);
    }

    public function begin($confgData,$templateData)
    {
        $account_arr=$this->getAccount();
        dump($account_arr["data"]);die;
        $mongodb = new \app\index\model\Mongodb();
        //账号起始
        $start_account = $confgData["send_account_id"];
        //邮箱发送起始
        $email_offset = $confgData["send_record_page"];
//        var_dump($confgData);
//        die;
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
            //500条数据
            $data = $mongodb->getPerstepEmail($confgData["province_id"], $confgData["brand_id"], $email_offset, 500);
            foreach ($data as $dk => $dv) {
                dump($dv);die;

            }


        }


    }

    /**
     * 获取账号相关数据
     * @return array
     */
    public function getAccount()
    {
        $account = new Account();
        $count=$account->count();
        if(empty($count)){
            exit("请先添加账号");
        }
        $acc=Account::column("account,pwd");
        var_dump($acc[]);die;
        return [
            "count"=>$count,
            "data"=>$acc->toArray()
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
    public function open_ob_start()
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