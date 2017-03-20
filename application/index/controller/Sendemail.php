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
        $this->begin($confgData);
    }

    public function begin($confgData)
    {


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

}