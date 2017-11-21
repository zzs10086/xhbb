<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => CEnv::HOST_API,
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'http\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-http',
        ],
        'urlManager' => [
              'rules' => require(__DIR__ . '/rule.php'),
              'enablePrettyUrl' => true,
              'showScriptName' => false,
              'enableStrictParsing' => true,
              //'suffix' => '.html',
               /*'rules' => [
                   '<controller:\w+>/<action:\w+>/<page:\d+>' => '<controller>/<action>',
                    "<controller:\w+>/<action:\w+>"=>"<controller>/<action>",
               ],*/
            //'enablePrettyUrl' => true,
            //'showScriptName' => false,
        ],
    ],
    'params' => $params,
];
