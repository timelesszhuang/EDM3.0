<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-17
 * Time: 下午3:54
 */
namespace app\index\model;

use think\Model;

class SendConfig extends Model
{
    /**
     * 获取所有省份
     * @return array
     */
    public function province()
    {
        return [
            '山东' => 'shandong',
            '北京' => 'beijing',
            '河南' => 'henan',
            '山西' => 'shanxi',
            '河北' => 'hebei',
            'CN库1' => 'cn1',
            'CN库2' => 'cn2',
            'CN库3' => 'cn3',
            'CN库4' => 'cn4',
            'CN库5' => 'cn5',
            '广东' => 'guangdong',
            '江苏' => 'jiangsu',
            '浙江' => 'zhejiang',
            '四川' => 'sichuan',
            '湖北' => 'hubei',
            '辽宁' => 'liaoning',
            '湖南' => 'hunan',
            '福建' => 'fujian',
            '上海' => 'shanghai',
            '安徽' => 'anhui',
            '陕西' => 'shanxi2',
            '内蒙古' => 'neimenggu',
            '广西' => 'guangxi',
            '江西' => 'jiangxi',
            '天津' => 'tianjin',
            '重庆' => 'chongqing',
            '黑龙江' => 'heilongjiang',
            '吉林' => 'jilin',
            '云南' => 'yunnan',
            '贵州' => 'guizhou',
            '新疆' => 'xinjiang',
            '甘肃' => 'gansu',
            '海南' => 'hainan',
            '宁夏' => 'ningxia',
            '青海' => 'qinghai',
            '西藏' => 'xizang',
            '香港' => 'hongkong',
            '澳门' => 'aomen',
            '台湾' => 'taiwan',
            '其他' => 'other',
        ];
    }
}