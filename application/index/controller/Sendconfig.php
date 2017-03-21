<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-17
 * Time: 下午3:36
 */
namespace app\index\controller;

use Phinx\Config;
use think\Db;
use think\Validate;

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

    /**
     * 添加配置信息
     */
    public function addData()
    {
        $rule = [
            ["title", "require|unique:SendConfig", "请填写标题"],
            ["province_id", "require", "请选择省份"],
            ["province_name", "require", "请选择省份"],
            ["template_id", "require", "请选择模板"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加配置", self::error);
        }
        //all需要删除掉 因为全部使用null代替
        if ($data["brand_id"] == "all") {
            unset($data["brand_id"]);
        }
        $sendconfig = new \app\index\model\SendConfig();
        $data['template_id'] = ',' . $data['template_id'] . ',';
        if (!$sendconfig->save($data)) {
            $this->msg("添加配置失败", "添加配置", self::error);
        }
        $this->msg("添加成功", "添加配置");
    }

    /**
     * 获取数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getData()
    {
        $sendconfig = new \app\index\model\SendConfig();
        list($limit, $rows, $query) = $this->getRequest();
        $where = [];
        if (!empty($query)) {
            $where["title"] = ["like", "%$query%"];
        }
        return $sendconfig->where($where)->order("id desc")->limit($limit, $rows)->select();
    }

    /**
     * 修改页面
     * @return \think\response\View
     */
    public function save()
    {
        $this->get_assign();
        $id = $this->request->post("id");
        $sendconfig = \app\index\model\SendConfig::get($id);
        if ($sendconfig) {
            $this->assign([
                "data" => $sendconfig->toArray()
            ]);
        }
        return view();
    }

    /**
     * 修改操作
     */
    public function saveData()
    {
        $rule = [
            ["title", "require|unique:SendConfig", "请填写标题"],
            ["province_id", "require", "请选择省份"],
            ["province_name", "require", "请选择省份"],
            ["template_id", "require", "请选择模板"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加配置", self::error);
        }
        $sendconfig = new \app\index\model\SendConfig();
        $id = $data["id"];
        unset($data["id"]);
        $data['template_id'] = ',' . $data['template_id'] . ',';
        if (!$sendconfig->save($data, ["id" => $id])) {
            $this->msg("修改失败", "修改配置", self::error);
        }
        $this->msg("修改成功", "修改配置");
    }

    /**
     * 获取省份信息
     * @return array
     */
    public function getProvince()
    {
        $sendconfig = new \app\index\model\SendConfig();
        $arr = [];
        foreach ($sendconfig->province() as $k => $v) {
            $arr[] = ["id" => $v, "text" => $k];
        }
        return $arr;
    }

    /**
     * 获取品牌
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getBrand()
    {
        $db2 = \think\Config::get("database.db_config2");
        $data = Db::connect($db2)->name("mx_brand")->field("id,name as text")->select();
        array_unshift($data, ["id" => 'all', "text" => "全部（带mx+不带mx）"]);
        array_unshift($data, ["id" => 0, "text" => "未分类品牌"]);
        return $data;
    }

    /**
     * 获取模板信息
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getTemplate()
    {
        $template = new \app\index\model\Template();
        return $template->field("id,title as text")->select();
    }
}