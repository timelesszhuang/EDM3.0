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

class Blacklist extends Base
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
            ["link_title", "unique:link", "名称不能重复"],
            ["redirect_url", "require", "请输入链接"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加链接", self::error);
        }
        $link = new \app\index\model\Link();
        if (!$link->save($data)) {
            $this->msg("添加失败", "添加链接", self::error);
        }
        $this->msg("添加成功", "添加链接");
    }

    /**
     * 获取json数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getData()
    {
        list($limit, $rows, $query) = $this->getRequest();
        $where = [];
        if ($query) {
            $where["link_title"] = ["like", "%" . $query . "%"];
        }
        $link = new \app\index\model\Link();
        return $link->where($where)->order("id desc")->limit($limit, $rows)->select();
    }

    /**
     * 修改也没展示
     * @return \think\response\View
     */
    public function save()
    {
        $this->get_assign();
        $id = $this->request->post("id");
        $link = \app\index\model\Link::get($id);
        if ($link) {
            $this->assign([
                "data" => $link->toArray()
            ]);
        }
        return view();
    }

    /**
     * 修改数据
     */
    public function saveData()
    {
        $rule = [
            ["link_title", "require", "请输入名称"],
            ["link_title", "unique:link", "名称不能重复"],
            ["redirect_url", "require", "请输入链接"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "修改链接", self::error);
        }
        $id = $data["id"];
        $link = new \app\index\model\Link();
        unset($data["id"]);
        if (!$link->save($data, ["id" => $id])) {
            $this->msg("修改失败", "修改链接", self::error);
        }
        $this->msg("修改成功", "修改链接");
    }

    /**
     * 删除链接
     */
    public function del()
    {
        $id = $this->request->post("id");
        if (!\app\index\model\Link::destroy($id)) {
            $this->msg("删除失败", "删除链接", self::error);
        }
        $this->msg("删除成功", "删除链接");
    }
}