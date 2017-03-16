<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-16
 * Time: 下午3:21
 */
namespace app\index\controller;

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

    public function add()
    {
        $this->get_assign();
        return view();
    }
}