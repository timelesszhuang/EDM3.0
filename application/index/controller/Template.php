<?php
/**
 * 模板控制器
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-17
 * Time: 上午11:00
 */
namespace app\index\controller;

use think\Validate;

class Template extends Base
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
     * 添加页面
     * @return \think\response\View
     */
    public function add()
    {
        $this->get_assign();
        return view();
    }

    /**
     * 添加模板数据
     */
    public function addData()
    {
        $rule = [
            ["title", "require|unique:template", "请填写标题|当前标题已经存在"],
            ["detail", "require", "请填写描述"],
            ["content", "require", "请填写内容"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "模板添加失败", self::error);
        }
        $template = new \app\index\model\Template();
        if (!$template->save($data)) {
            $this->msg("添加错误", "添加模板", self::error);
        }
        $this->msg("添加成功", "添加模板");
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
            $where["title"] = ["like", "%$query%"];
        }
        $template = new \app\index\model\Template();
        return $template->order("id desc")->where($where)->limit($limit, $rows)->select();
    }

    /**
     * 修改页面展示
     * @return \think\response\View
     */
    public function save()
    {
        $this->get_assign();
        $id = $this->request->post("id");
        $template = \app\index\model\Template::get($id);
        if ($template) {
            $this->assign([
                "data" => $template->toArray()
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
            ["title", "require|unique:template", "请填写标题|当前标题已经存在"],
            ["detail", "require", "请填写描述"],
            ["content", "require", "请填写内容"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "模板添加失败", self::error);
        }
        $id = $data["id"];
        $template = new \app\index\model\Template();
        unset($data["id"]);
        if (!$template->save($data, ["id" => $id])) {
            $this->msg("修改失败", "修改链接", self::error);
        }
        $this->msg("修改成功", "修改链接");
    }

    /**
     * 删除操作
     */
    public function del()
    {
        $id = $this->request->post("id");
        if (!\app\index\model\Template::destroy($id)) {
            $this->msg("删除失败", "删除信息", self::error);
        }
        $this->msg("删除成功", "删除信息");
    }

}