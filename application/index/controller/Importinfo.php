<?php
/**
 * 该控制器用于数据导入操作
 * Created by PhpStorm.
 * User: 赵兴壮<834916321@qq.com>
 * Date: 17-3-16
 * Time: 下午 4:33
 */
namespace app\index\controller;

use think\Db;
use think\Validate;

class Importinfo extends Base
{
    /**
     * 首页展示
     * @return mixed
     */
    public function index()
    {
        ignore_user_abort(true);
        set_time_limit(0);
        $destination = 'static/Uploads/blacklist.csv';
        $file = fopen($destination, "r");
        $alldata = array();
        while ($data_line = fgetcsv($file)) {
            $alldata[] = [
                'domain' => $data_line[0],
                'reason' => '网易相关经销商',
                'addtime' => time(),
                'updatetime' => time()
            ];
        }
        Db::name('blacklist')->insertAll($alldata);
    }

}