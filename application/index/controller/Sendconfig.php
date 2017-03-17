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

    public function addData()
    {
        $rule = [
            ["title", "require|unique:sendconfig", "请填写标题"],
            ["province_id", "require", "请选择省份"],
            ["province_name", "require", "请选择省份"],
            ["brand_id", "require", "请选择品牌"],
            ["brand_name", "require", "请选择品牌"],
            ["template_id", "require", "请选择模板"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg("");
        }
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