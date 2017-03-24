<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-22
 * Time: 上午11:15
 */
namespace app\index\model;

use think\Model;

class SendError extends Model
{
    /**
     * 发送错误记录
     * @param $account
     * @param $toemail
     * @param $error
     * @param $temp_id
     */
    public function add($account, $toemail, $error, $temp_id)
    {
        $this->save([
            "account" => $account,
            "toemail" => $toemail,
            "error_msg" => $error,
            "template_id" => $temp_id
        ]);

    }

}