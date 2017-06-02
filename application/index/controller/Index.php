<?php
namespace app\index\controller;


use app\index\model\SendConfig;
use app\index\model\SendRecord;
use think\Db;

class Index extends Base
{

    public function _initialize()
    {
        parent::_initialize();
    }


    /**
     * 条竹跳转到首页
     * @access public
     */
    public function index()
    {
        return $this->fetch('index', ['msg' => '登录成功。']);
    }

    /**
     * 邮箱推广图的数据提取
     */
    public function getReadData()
    {
        $config = Db::name('send_config')->where('id' >= 0)->column('id,title,province_name,count');
        $name = [];
        $read_data = [];
        $unread_data = [];
        $send_record = Db::name('send_record');
        foreach ($config as $id => $v) {
            $name[] = $v['title'];
            $count = $v['count'];
            $r_count = $send_record->where(['config_id' => $v['id'], 'read_num' => ['gt', 0]])->count();
            $read_data[] = $r_count;
            $unread_data[] = intval($count) - intval($r_count);
        }
        exit(json_encode(["name" => $name, "data" => [['name' => '阅读数量', 'data' => $read_data], ['name' => '未阅读数量', 'data' => $unread_data]]]));
    }

    /**
     * 已发送数量/未发送数量
     * @return array
     */
    public function sendCount()
    {
        $sendconfig = new SendConfig();
        $sendrecord = new SendRecord();
        $data = $sendconfig->select();
        $name = [];
        $Cdata = [];
        foreach ($data as $datak => $datav) {
            $name[] = $datav["title"];
            //已发
            $send=intval($sendrecord->where(["config_id" => $datav["id"]])->count());
            //未发数组
            $Cdata[] = intval($datav["count"])-$send;
            //已发送数组
            $sendData[] =$send;
        }
        return [
            "name" => $name, "data" => [["name" => '未发送', "data" => $Cdata], ["name" => "已发送", "data" => $sendData]]
        ];
    }

}
