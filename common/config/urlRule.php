<?php
/**
 * Created by PhpStorm.
 * User: xudonghai
 * Date: 2017/3/19 14:08
 * 网站url配置，只是为了将CUrlManage中的信息提取出来，单独管理
 */
return [
    CEnv::HOST_WWW => [
        'hostInfo' => CEnv::HOST_WWW,
        'baseUrl' => CEnv::HOST_WWW,
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'cache' => 'filecacheclean',
        'rules' => require(__DIR__ . '/../../http/config/rule.php'),
    ],
    CEnv::HOST_API => [
        'hostInfo' => CEnv::HOST_API,
        'baseUrl' => CEnv::HOST_API,
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'cache' => 'filecacheclean',
        'rules' => require(__DIR__ . '/../../api/config/rule.php'),
    ],

];