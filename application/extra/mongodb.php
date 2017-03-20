<?php
/**
 * Created by PhpStorm.
 * mongodb 的相关配置文件
 * User: timeless
 * Date: 17-3-20
 * Time: 上午9:19
 */

$user = "admin";
$pwd = "qiangbi123";
$server = "115.28.161.44";
$port = '27017';
# 表示用于登陆授权的数据库
$db_name = "admin";
# mongodb 相关操作
return [
    'default_db' => 'mxmanage',
    'mongodb_auth_url' => "mongodb://{$user}:{$pwd}@{$server}/{$db_name}",
];
