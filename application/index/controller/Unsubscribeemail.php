<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-20
 * Time: 下午5:23
 */
namespace app\index\controller;

use app\index\model\SendRecord;
use think\Controller;
use think\Request;

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
            $this->modifly_record([$email_id, $_SERVER['REMOTE_ADDR'], $email_one_data, $model_record]);
        }
        $this->makeImg();
    }

    /**
     * 生成探针图片
     */
    public function makeImg()
    {
        $url = "sys/image/code.png";
        $img = imagecreatefrompng($url);
        @header("Content-Type:image/png");
        imagepng($img);
    }

    /**
     * 生成退订链接
     * @param $arr
     * @return string
     */
    public function unsubscribeEmail($recordId, $email, $md5_str)
    {
        $domain = Config::get("emailDomain.domain");
        $url = $domain . Url::build("UnsubscribeEmail/unsubscribeEmail", "id=$recordId&email=$email&registrant_name=$md5_str");
        return "<a href='" . $url . "' target='_blank'>退订邮件</a>";
    }

    /**
     * 导入账号
     */
    public function importAccount()
    {
        $data=[];
        for ($i = 0; $i < 200; $i++) {
            $account="aa";
            $suffix="@rishin.com.cn";
            if($i>0){
                $account=$account.$i;
            }
            $info=[
                "account"=>$account.$suffix,
                "pwd"=>"Qiangbi135"
            ];
            $data[]=$info;
        }
//        var_dump((new\app\index\model\Account)->saveAll($data));
    }
}