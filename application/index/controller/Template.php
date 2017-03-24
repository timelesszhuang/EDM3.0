<?php
/**
 * 模板控制器
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-17
 * Time: 上午11:00
 */
namespace app\index\controller;

use app\index\model\Link;
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
        $link_arr=(new Link())->field("link_url,link_title")->select();
        $this->assign([
            "data"=>$link_arr
        ]);
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
            ["content", "require", "请填写内容"],
            ["type", 'require', '请选择模板类型']
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
        $list = $template->order("id desc")->where($where)->limit($limit, $rows)->select();
        array_walk($list, [$this, 'formatType']);
        return $list;
    }

    /**
     * 格式化类型数据
     * @access public
     */
    public function formatType(&$v, $k)
    {
        $type = \app\index\model\Template::getTemplateType();
        $v['type'] = $type[$v['type']];
    }

    /**
     * 获取模板的类型
     * @access public
     */
    public function typeTree()
    {
        $type = \app\index\model\Template::getTemplateType();
        foreach ($type as $k => $v) {
            $arr[] = ["id" => $k, "text" => $v];
        }
        array_unshift($arr,[
            "id"=>0,
            "text"=>"请选择模板分类"
        ]);
        return $arr;
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
        $link_arr=(new Link())->field("link_url,link_title")->select();
        if ($template) {
            $this->assign([
                "data" => $template->toArray(),
                "link"=>$link_arr
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
            ["content", "require", "请填写内容"],
            ["type", "require", "请选择模板分类"],
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
        $sendconfig = new \app\index\model\SendConfig();
        if ($sendconfig->where('template_id', 'like', "%,$id,%")->find()) {
            $this->msg("该模板已经在配置中，请先取消配置中选择。", "删除失败。", self::error);
        }
        if (!\app\index\model\Template::destroy($id)) {
            $this->msg("删除失败", "删除信息", self::error);
        }
        $this->msg("删除成功", "删除信息");
    }

}