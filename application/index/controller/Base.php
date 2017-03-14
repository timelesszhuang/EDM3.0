<?php
/**
 * Created by PhpStorm.
 * User: timeless
 * Date: 16-11-2
 * Time: 上午9:13
 */

namespace app\index\controller;


use think\Controller;
use think\Hook;
use think\Request;

/**
 * 基本操作 公共类库 比如 判断是不是已经登陆了
 */
class Base extends Controller
{
    
    const error = 'failed';
    const success = 'success';

    /**
     * _initialize()
     * 判断用户登录状态
     * @access public
     * @todo 登录验证
     */
    public function _initialize()
    {
        parent::_initialize();
        //需要判断是不是已经登陆了
        $action = array();
        //调用钩子方法 判断是不是已经登录
        if (!Hook::exec('app\\index\\behavior\\Authenticate', 'run', $action)) {
            //表示没有登陆的操作
            $this->redirect('login/index', ['alert' => '请先登陆系统。']);
        }
    }

    /**
     * 前台分配数据   modal_id  datagrid_id 数据
     * @access public
     */
    public function get_assign()
    {
        $this->assign('modal_id', Request::instance()->param('modal_id'));
        $this->assign('datagrid_id', Request::instance()->param('datagrid_id'));
    }

}