<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-17
 * Time: 下午3:36
 */
namespace app\index\controller;

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
            ["fromname", "require", "请填写邮件昵称"],
            ["province_id", "require", "请选择省份"],
            ["province_name", "require", "请选择省份"],
            ["template_id", "require", "请选择模板"],
            ["config_type", "require", "请选择配置类型"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加配置", self::error);
        }
        //all需要删除掉 因为全部使用null代替
        if ($data["brand_id"] == "all") {
            unset($data["brand_id"]);
            $data["brand_name"] = "全部";
        }
        $sendconfig = new \app\index\model\SendConfig();
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
            ["fromname", "require", "请填写邮件昵称"],
            ["province_id", "require", "请选择省份"],
            ["province_name", "require", "请选择省份"],
            ["template_id", "require", "请选择模板"],
            ["config_type", "require", "请选择配置类型"]
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
    public function getMailBrand()
    {
        $db2 = \think\Config::get("database.db_config2");
        $data = Db::connect($db2)->name("mx_brand")->field("id,name as text")->select();
        array_unshift($data, ["id" => 'all', "text" => "全部（带mx+不带mx）"]);
        array_unshift($data, ["id" => 0, "text" => "未分类品牌"]);
        return $data;
    }

    /**
     * 获取邮箱品牌
     * @access public
     */
    public function configContactToolBrand()
    {
        $data = [
            ["id" => "all", "text" => "全部"],
            ["id" => 1, "text" => "七鱼智能客服"],
            ["id" => 2, "text" => "53kf"],
            ["id" => 3, "text" => "U-desk"],
            ["id" => 4, "text" => "环信"],
            ["id" => 5, "text" => "美洽"],
            ["id" => 6, "text" => "智齿"],
            ["id" => 7, "text" => "小能"],
            ["id" => 8, "text" => "有客云"],
            ["id" => 9, "text" => "Live800"],
            ["id" => 10, "text" => "营销QQ"],
            ["id" => 11, "text" => "营销QQ2"],
            ["id" => 12, "text" => "EC企信"],
            ["id" => 13, "text" => "乐语"],
            ["id" => 14, "text" => "TQ洽谈通"],
            ["id" => 15, "text" => "网站商务通"],
            ["id" => 16, "text" => "Talk99"],
            ["id" => 17, "text" => "逸创云客服"],
        ];
        return $data;
    }

    /**
     * 配置类型
     * @access public
     */
    public function configType()
    {
        $data = [
            ["id" => 'email', "text" => "邮箱地址"],
            ["id" => 'contacttool', "text" => "咨询工具"],
            ["id" => 'website', "text" => "网站"],
        ];
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

    /**
     * 根据type_id获取模板数据
     * @param $type_id
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getTemplateByid($type_id)
    {
        $template = new \app\index\model\Template();
        return $template->where(["type"=>$type_id])->field("id,title as text")->select();
    }

    /**
     * 网站类型
     * @return array
     */
    public function websiteType()
    {
        return [
            ["id" => "all", "text" => "全部"],
            ["id" => "none_website", "text" => "没有网站"],
            ["id" => "have_website", "text" => "有网站"]
        ];
    }

    /**
     * 再次跟进
     * @return \think\response\View
     */
    public function resend()
    {
        $id = $this->request->post("id");
        $this->assign([
            "id" => $id
        ]);
        $this->get_assign();
        return view();
    }

    /**
     * 再次跟进添加
     */
    public function resendData()
    {
        $rule = [
            ["parent_id", "require", "请选择配置项"],
            ["template_id", "require", "请选择模板"],
            ["select_number","require","请填写选取数量"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "再次跟进", self::error);
        }
        $sendconfig = new \app\index\model\SendConfig();
        if (!$sendconfig->save($data)) {
            $this->msg("添加失败", "修改配置", self::error);
        }
        $this->msg("添加成功", "修改配置");
    }
}