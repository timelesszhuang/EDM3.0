<?php
/**
 * 链接控制器
 * Created by PhpStorm.
 * User: suiguozhen  15863549041@126.com
 * Date: 17-3-16
 * Time: 下午3:21
 */
namespace app\index\controller;

use think\Db;
use think\Validate;

class Link extends Base
{
    /**
     * 首页展示
     * @return mixed
     */
    public function index()
    {
        return view();
    }

    /**
     *添加链接页面
     * @return \think\response\View
     */
    public function add()
    {
        $this->get_assign();
        return view();
    }

    /**
     * 链接添加 数据
     * @return array
     */
    public function addData()
    {
        $rule = [
            ["link_title", "require", "请输入名称"],
            ["link_title","unique:link","名称不能重复"],
            ["redirect_url", "require", "请输入链接"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加链接", self::error);
        }
        if (!Db::name("link")->insert($data)) {
            $this->msg("添加失败", "添加链接", self::error);
        }
        $this->msg("添加成功", "添加链接");
    }
    public function getData()
    {
        
    }
}