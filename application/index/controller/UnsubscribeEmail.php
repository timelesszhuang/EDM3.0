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

class UnsubscribeEmail extends Controller
{

    /**
     * 用户查看邮件时的操作
     * @param $id
     */
    public function actionMake_detect_img($id)
    {
        //获取邮箱记录id
        $email_id=Request::instance()->param("id");
        $sendRecord=SendRecord::get($email_id);


        if ($sendRecord) {
            $this->modifly_record([$email_id,$_SERVER['REMOTE_ADDR'], $email_one_data, $model_record]);
        }
        $this->actionMake_img();
    }

    /**
     * 生成探针图片
     */
    public function makeImg()
    {
        $url="sys/image/code.png";
        $img=imagecreatefrompng($url);
        @header("Content-Type:image/png");
        imagepng($img);
    }
}