<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-17
 * Time: 下午3:36
 */
namespace app\index\controller;

class Sendconfig extends Base
{
    /**
     * 首页展示
     * @return \think\response\View
     */
    public function index()
    {
        return view();
    }

    /**
     * 添加页面展示
     * @return \think\response\View
     */
    public function add()
    {
        $this->get_assign();
        return view();
    }

    public function addData()
    {

    }

    /**
     * 获取省份信息
     * @return array
     */
    public function getProvince()
    {
        $sendconfig=new \app\index\model\SendConfig();
        $arr=[];
        foreach($sendconfig->province() as $k=>$v){
            $arr[]=["id"=>$v,"text"=>$k];
        }
        return $arr;
    }
}