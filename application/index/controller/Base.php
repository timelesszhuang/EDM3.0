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
use think\Session;

/**
 * 基本操作 公共类库 比如 判断是不是已经登陆了
 */
class Base extends Controller
{
    protected $request;
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
        $this->request = Request::instance();
        //需要判断是不是已经登陆了
        $action = array();
        //调用钩子方法 判断是不是已经登录
        if (!Hook::exec('app\\index\\behavior\\Authenticate', 'run', $action)) {
            //表示没有登陆的操作
            $this->redirect('login/index', ['alert' => '请先登陆系统。']);
        }
        $this->checkToken();
    }

    /**
     * 前台分配数据   modal_id  datagrid_id 数据
     * @access public
     */
    public function get_assign()
    {
        $this->assign('modal_id', Request::instance()->param('modal_id'));
        $this->assign('datagrid_id', Request::instance()->param('datagrid_id'));
        $this->assign("token", $this->buildToken());
    }

    /**
     * 生成token
     * @return string
     */
    public function buildToken()
    {
        $md5 = md5(md5(time() . chr(rand(65, 90)) . rand(1, 1000)) . rand(1, 1000));
        Session::set("token", $md5);
        return $md5;
    }

    /**
     * 验证token
     * @return array
     */
    public function checkToken()
    {
        $token = Session::get("token");
        $getToken = $this->request->post("token");
        if (empty($getToken)) {
            return true;
        }
        if ($token != $getToken) {
            exit(json_encode([
                "status" => self::error,
                "msg" => "请不要重复提交",
                "title" => "数据提交"
            ]));
        }
    }

    /**
     * 删除token
     */
    public function deleteToken()
    {
        Session::delete("token");
    }

    /**
     * 统一的信息打印
     * @param $msg
     * @param $title
     * @param string $status
     */
    public function msg($msg,$title,$status="success")
    {
        if($status=="success"){
            $this->deleteToken();
        }
        exit(json_encode([
            "status" => $status,
            "msg" => $msg,
            "title" => $title
        ]));
    }

}