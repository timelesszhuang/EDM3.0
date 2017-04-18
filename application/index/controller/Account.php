<?php
/**
 * 账号管理
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-20
 * Time: 上午9:58
 */
namespace app\index\controller;

use think\Validate;

class Account extends Base
{
    /**
     * 首页html展示
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

    /**
     * 添加账号
     */
    public function addData()
    {
        $rule = [
            ["account", "require|unique:Account", "请填写账号|账号必须唯一"],
            ["pwd", "require", "请输入密码"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加账号", self::error);
        }
        if (!\app\index\model\Account::create($data)) {
            $this->msg("添加失败", "添加账号", self::error);
        }
        $this->msg("添加成功", "添加账号");
    }

    /**
     * 获取数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getData()
    {
        list($limit, $rows, $query) = $this->getRequest();
        $where = [];
        if (!empty($query)) {
            $where["account"] = ["like", "%$query%"];
        }
        $account = new \app\index\model\Account();
        $count=$account->where($where)->count();
        $data=$account->where($where)->order("id", "desc")->limit($limit, $rows)->select();
        return ["total"=>$count,"rows"=>$data];
    }

    /**
     * 修改页面展示
     * @return \think\response\View
     */
    public function save()
    {
        $id = $this->request->post("id");
        $account = \app\index\model\Account::get($id);
        if ($account) {
            $this->assign([
                "data" => $account->toArray()
            ]);
        }
        $this->get_assign();
        return view();
    }

    /**
     * 修改账号
     */
    public function saveData()
    {
        $rule = [
            ["account", "require|unique:Account", "请填写账号|账号必须唯一"],
            ["pwd", "require", "请输入密码"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加账号", self::error);
        }
        $account = new \app\index\model\Account();
        if (!$account->update($data)) {
            $this->msg("修改失败", "修改账号", self::error);
        }
        $this->msg("修改成功", "修改账号");
    }

    /**
     * 删除
     */
    public function del()
    {
        $account = \app\index\model\Account::get($this->request->post("id"));
        if (!$account->delete()) {
            $this->msg("删除失败", "删除账号", self::error);
        }
        $this->msg("删除成功", "删除账号");
    }

}