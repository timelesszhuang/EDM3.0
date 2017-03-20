<?php
/**
 * 用于mongodb 取数据
 * User: timeless
 * Date: 17-3-18
 * Time: 下午12:09
 */

namespace app\index\model;

use think\Config;
use think\Model;

class Mongodb extends Model
{

    /**
     * 获取每一步指定数量的
     * @access public
     * @param  $province 省市信息表示 要从哪一个 collection 中取数据
     * @param  $brand_id 品牌id  表示要取出哪个品牌的相关信息
     * @param  $start 开始的id
     * @param  $step  发送截止 到的地方
     * @return mixed
     */
    public function getPerstepEmail($province, $brand_id, $start, $step)
    {
        $options_base = ['connectTimeoutMS' => 500000, 'socketTimeoutMS' => 500000];
        $manager = new \MongoDB\Driver\Manager(Config::get('mongodb.mongodb_auth_url'), $options_base);
        $coll = Config::get('mongodb.default_db') . '.' . $province;
        $filter = [];
        //返回品牌相关信息
        if ($brand_id !== null) {
            $filter['mx.brand_id'] = intval($brand_id);
        }
        $options = [
            "skip" => $start,
            "limit" => $step,
            'projection' => [
                'wwwtitle' => 1,
                'contact_email' => 1,
                'domain_name' => 1,
                'mx' => 1
            ],
        ];
        $query = new \MongoDB\Driver\Query($filter, $options);
        $rows = $manager->executeQuery($coll, $query);
        $info = [];
        foreach ($rows as $document) {
            $per = [];
            $doc = (array)$document;
            $per['qiye_mailaddress'] = '';
            if (isset($doc['mx'])) {
                $per['qiye_mailaddress'] = 'admin@' . $doc['domain_name'];
            }
            $per['domain'] = $doc['domain_name'];
            $per['person_mailaddress'] = $doc['contact_email'];
            $per['wwwtitle'] = $doc['wwwtitle'];
            $per['object_id'] = (string)$doc['_id'];
            $info[] = $per;
        }
        return $info;
    }

    /**
     * 获取每一条数据
     * @access public
     */
    public function getCount($province, $brand_id)
    {
        $options_base = ['connectTimeoutMS' => 500000, 'socketTimeoutMS' => 500000];
        $manager = new \MongoDB\Driver\Manager(Config::get('mongodb.mongodb_auth_url'), $options_base);
        $filter = [];
        //返回品牌相关信息
        if ($brand_id !== null) {
            $filter['mx.brand_id'] = intval($brand_id);
        }
        //查询记录总的数量
        $commands = [
            'count' => $province,
            'query' => $filter
        ];
        $command = new \MongoDB\Driver\Command($commands);
        $cursor = $manager->executeCommand('mxmanage', $command);
        $info = $cursor->toArray();
        $count = $info[0]->n;
        return $count;
    }


}