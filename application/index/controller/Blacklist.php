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
     * 域名黑名单 首页
     * @return mixed
     */
    public function domainIndex()
    {
        return view();
    }

    /**
     *添加链接页面
     * @return \think\response\View
     */
    public function addDomain()
    {
        $this->get_assign();
        return view();
    }


    /**
     * 添加域名
     * @return array
     */
    public function execAddDomainData()
    {
        $rule = [
            ["domain", "require", "请输入域名"],
            ["domain", "unique:blacklist", "域名不能重复"],
            ["reason", "require", "请输入拉黑原因"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加链接", self::error);
        }
        $link = new \app\index\model\Blacklist();
        if (!$link->save($data)) {
            $this->msg("添加失败", "添加链接", self::error);
        }
        $this->msg("添加成功", "添加链接");
    }

    /**
     * 获取json数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getDomainData()
    {
        list($limit, $rows, $query) = $this->getRequest();
        $where = [];
        if ($query) {
            $where["domain"] = ["like", "%" . $query . "%"];
        }
        $link = new \app\index\model\Blacklist();
        $data = $link->where($where)->order("id desc")->limit($limit, $rows)->select();
        return $data;
    }


    /**
     * 修改也没展示
     * @return \think\response\View
     */
    public function saveDomain()
    {
        $this->get_assign();
        $id = $this->request->post("id");
        $bl = \app\index\model\Blacklist::get($id);
        if ($bl) {
            $this->assign([
                "data" => $bl->toArray()
            ]);
        }
        return view();
    }

    /**
     * 修改黑名单中的数据
     * @access public
     */
    public function execSaveDoamin()
    {
        $rule = [
            ["reason", "require", "请输入拉黑原因"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "修改链接", self::error);
        }
        $id = $data["id"];
        $bl = new \app\index\model\Blacklist();
        unset($data["id"]);
        unset($data['domain']);
        if (!$bl->save($data, ["id" => $id])) {
            $this->msg("修改失败", "修改链接", self::error);
        }
        $this->msg("修改成功", "修改链接");
    }

    /**
     * 删除链接
     */
    public function delDomain()
    {
        $id = $this->request->post("id");
        if (!\app\index\model\Blacklist::destroy($id)) {
            $this->msg("删除失败", "删除链接", self::error);
        }
        $this->msg("删除成功", "删除链接");
    }

    /**
     * 邮件首页
     * @access public
     */
    public function emailIndex()
    {
        return view();
    }

    /**
     * 获取邮件黑名单列表
     * @access public
     */
    public function getEmailData()
    {
        list($limit, $rows, $query) = $this->getRequest();
        $where = [];
        if ($query) {
            $where["email"] = ["like", "%" . $query . "%"];
        }
        $data = (new \app\index\model\UnsendMail())->where($where)->order("id desc")->limit($limit, $rows)->select();
        return $data;
    }


    /**
     * 添加删除 email
     * @access public
     */
    public function addEmail()
    {
        $this->get_assign();
        return view();
    }

    /**
     * 添加删除 email
     * @access public
     */
    public function execAddEmail()
    {
        $rule = [
            ["email", "require", "请输入邮箱地址"],
            ["email", "unique:unsend_mail", "邮箱地址不能重复"],
            ["email", "email", '邮箱格式不正确，请重新输入。'],
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "添加链接", self::error);
        }
        $data['type'] = '20';
        $unsendMail = new \app\index\model\UnsendMail();
        if (!$unsendMail->save($data)) {
            $this->msg("添加失败", "添加链接", self::error);
        }
        $this->msg("添加成功", "添加链接");
    }

    /**
     * 添加删除 email
     * @access public
     */
    public function saveEmail()
    {
        $this->get_assign();
        $id = $this->request->post("id");
        $unsendEmail = \app\index\model\UnsendMail::get($id);
        if ($unsendEmail) {
            $this->assign([
                "data" => $unsendEmail->toArray()
            ]);
        }
        return view();
    }

    /**
     * 添加删除 email
     * @access public
     */
    public function execEditEmail()
    {
        $rule = [
            ["detail", "require", "请输入拉黑原因"]
        ];
        $validate = new Validate($rule);
        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->msg($validate->getError(), "修改链接", self::error);
        }
        $id = $data["id"];
        $unsendEmail = new \app\index\model\UnsendMail();
        unset($data["id"]);
        unset($data['email']);
        if (!$unsendEmail->save($data, ["id" => $id])) {
            $this->msg("修改失败", "修改链接", self::error);
        }
        $this->msg("修改成功", "修改链接");
    }

    /**
     * 删除邮件地址
     * @access public
     */
    public function delEmail()
    {
        $id = $this->request->post("id");
        if (!\app\index\model\UnsendMail::destroy($id)) {
            $this->msg("删除失败", "删除链接", self::error);
        }
        $this->msg("删除成功", "删除链接");
    }

}