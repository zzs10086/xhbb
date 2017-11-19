<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => CEnv::HOST_API,
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        'urlManager' => [
            'rules' => require(__DIR__ . '/rule.php'),
        ],
    ],
    'params' => $params,
];
