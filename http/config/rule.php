<?php
/**
 * Created by PhpStorm.
 * User: xudonghai
 * Date: 2017/3/13 10:51
 */
return [

    '' => 'index/index',
    'show/<id:\d+>.html' => 'index/show',
    'show/<id:\d+>_<page:\d+>.html' => 'index/show',

    'xinggan/<page:\d+>.html' => 'index/xinggan',
    'xinggan/' => 'index/xinggan',

    'fengru/<page:\d+>.html' => 'index/fengru',
    'fengru/' => 'index/fengru',


    'qiaotun/<page:\d+>.html' => 'index/qiaotun',
    'qiaotun' => 'index/qiaotun',

    'meitui/<page:\d+>.html' => 'index/meitui',
    'meitui/' => 'index/meitui',

    'nvshen/<page:\d+>.html' => 'index/nvshen',
    'nvshen/' => 'index/nvshen',

    'zhifu/<page:\d+>.html' => 'index/zhifu',
    'zhifu/' => 'index/zhifu',

    'xiezhen/<page:\d+>.html' => 'index/xiezhen',
    'xiezhen/' => 'index/xiezhen',

    'mote/<page:\d+>.html' => 'index/mote',
    'mote/' => 'index/mote',
    //"<controller:\w+>/<action:\w+>"=>"<controller>/<action>",
    //'<controller:\w+>/<action:\w+>/<page:\d+>' => '<controller>/<action>',

];