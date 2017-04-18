<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-17
 * Time: 下午2:16
 */
namespace app\index\model;

use think\Model;

class Template extends Model
{

    public static function getTemplateType()
    {
        return [
            '10' => '邮箱',
            '20' => '有道',
            '30' => '七鱼',
            '40' => '域名',
            '50' => '其他'
        ];
    }
}