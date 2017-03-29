<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-20
 * Time: 下午5:23
 */
namespace app\index\controller;

use app\common\controller\EmailUtil;
use app\index\model\Link;
use app\index\model\SendRecord;
use app\index\model\SendrecordLinkinfo;
use app\index\model\UnsendMail;
use think\Controller;
use think\Request;
use think\Config;
use think\Url;

class Unsubscribeemail extends Controller
{
    /**
     * 用户查看邮件时的操作
     * @param $id
     */
    public function makeDetectImg($id)
    {
        //获取邮箱记录id
        $email_id = Request::instance()->param("id");
        $sendRecord = SendRecord::get($email_id);
        if ($sendRecord) {
            $this->saveEmailRecord($email_id, $sendRecord);
        }
        $this->makeImg();
    }

    /**
     * 查看邮件时 使用探针修改查看邮件记录
     * @param $email_id
     * @param $sendRecord
     */
    public function saveEmailRecord($email_id, $sendRecord)
    {
        $ip_arr = (new EmailUtil)->get_ip_info($_SERVER["REMOTE_ADDR"])["data"];
        //如果序列化是空的话
        if (empty($sendRecord->ip_serialize)) {
            $sendRecord->read_num++;
            $ip_info = $ip_arr["province"] . "-" . $ip_arr["city"];
            $ipSerialize = [
                0 => [
                    "ip_info" => $ip_info,
                    "ip" => $_SERVER["REMOTE_ADDR"]
                ]
            ];
            $sendRecord->ip_serialize = serialize($ipSerialize);
            $sendRecord->save();
        } else {
            $ipSerialize = unserialize($sendRecord->ip_serialize);
            $ip_info = $ip_arr["province"] . "-" . $ip_arr["city"];
            $ipSerialize[] = [
                "ip_info" => $ip_info,
                "ip" => $_SERVER["REMOTE_ADDR"]
            ];
            $sendRecord->ip_serialize = serialize($ipSerialize);
            $sendRecord->read_num++;
            $sendRecord->save();
        }
    }

    /**
     * 生成探针图片
     */
    public function makeImg()
    {
        $img = imagecreate(500, 80);
        imagecolorallocate($img, 0xff, 0xcc, 0xcc);
        $black = imagecolorallocate($img, 0, 0, 0);
        header('Content-Type: image/png');
        imagepng($img);
    }

    /**
     * 生成退订链接
     * @param $arr
     * @return string
     */
    public function makeUnsubscribeEmail($recordId, $email, $md5_str)
    {
        $domain = Config::get("emailDomain.domain");
        $url = $domain . Url::build("Unsubscribeemail/unsubscribeEmail", "id=$recordId&email=$email&registrant_name=$md5_str");
        return "<a href='" . $url . "' target='_blank'>退订邮件</a>";
    }

    /**
     * 点击退订后验证并跳转
     * @return mixed
     */
    public function unsubscribeEmail()
    {
        $request=Request::instance();
        $id=$request->param("id");
        $email=$request->param("email");
        $registrant_name=$request->param("registrant_name");
        //验证MD5
        if ($registrant_name == md5($email . "registrant_name")) {
            return $this->fetch("public/unsubscribeemail",["id"=>$id,"email"=>$email]);
        }
    }

    /**
     * 添加到退订表中
     */
    public function addUnsubscribe()
    {
        header('Access-Control-Allow-Origin:*');
        $request=Request::instance();
        $id=$request->param("id");
        $email=$request->param("email");
        $scriberse=$request->param("customer_subscribe");
        if(empty($scriberse)){
            //查询是否存在email
            $modelUnsend=(new UnsendMail())->where(["email"=>$email])->find();
            //不存在添加
            if(empty($modelUnsend)){
                (new UnsendMail())->save([
                    "email"=>$email,
                    "detail"=>"用户退订",
                    "type"=>10
                ]);
            }
        }else{
            (new UnsendMail())->where(["email"=>$email])->delete();
        }
        exit(json_encode(["msg"=>"修改成功"]));
    }

    /**
     * 点击链接后的跳转
     */
    public function linkJump()
    {
        //链接id
        $link_id = Request::instance()->param("link_id");
        //记录id
        $record_id = Request::instance()->param("record_id");
        $sendlink = new SendrecordLinkinfo();
        $link = Link::get($link_id);
        $link->read_num=++$link->read_num;
        $linkRecord = $sendlink->where(["sendrecord_id" => $record_id])->find();
        //添加链接点击记录
        $this->saveLinkRecord($linkRecord, $link_id, $record_id, $link->link_title);
        $link->save();
        //页面跳转
        $this->redirect($link->redirect_url);
    }

    /**
     * 点击链接修改link_record记录
     * @param $linkRecord
     * @param $link_id
     * @param $record_id
     */
    public function saveLinkRecord($linkRecord, $link_id, $record_id, $link_title)
    {
        $ip_arr = (new EmailUtil)->get_ip_info($_SERVER["REMOTE_ADDR"])["data"];
        if (empty($linkRecord)) {
            $read_number = 1;
            $ip_info = $ip_arr["province"] . "-" . $ip_arr["city"];
            $ip = $ip_arr["ip"];
            $ipSerialize = [
                0 => [
                    "ip_info" => $ip_info,
                    "ip" => $_SERVER["REMOTE_ADDR"]
                ]
            ];
            $linkInfo = new SendrecordLinkinfo();
            $linkInfo->sendrecord_id = $record_id;
            $linkInfo->link_id = $link_id;
            $linkInfo->link_title = $link_title;
            $linkInfo->read_num = $read_number;
            $linkInfo->ipinfo_serialize = serialize($ipSerialize);
            $linkInfo->save();
        } else {
            $recordInfo = (new SendrecordLinkinfo())->where(["sendrecord_id" => $record_id])->find();
            $ipSerialize = unserialize($recordInfo->ipinfo_serialize);
            $ip_info = $ip_arr["province"] . "-" . $ip_arr["city"];
            $ip = $ip_arr["ip"];
            $ipSerialize[] = [
                "ip_info" => $ip_info,
                "ip" => $ip
            ];
            $recordInfo->ipinfo_serialize = serialize($ipSerialize);
            $recordInfo->read_num = $recordInfo->read_num + 1;
            $recordInfo->save();
        }

    }

    /**
     * 导入账号
     */
    public function importAccount()
    {
        $data = [];
        for ($i = 0; $i < 200; $i++) {
            $account = "aa";
            $suffix = "@rishin.com.cn";
            if ($i > 0) {
                $account = $account . $i;
            }
            $info = [
                "account" => $account . $suffix,
                "pwd" => "Qiangbi135"
            ];
            $data[] = $info;
        }
//        var_dump((new\app\index\model\Account)->saveAll($data));
    }
}