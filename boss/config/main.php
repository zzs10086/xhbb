<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')

);

return [
    'id' => 'app-boss',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'boss\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-boss',
        ],
        'user' => [
            'identityClass' => 'boss\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-boss', 'httpOnly' => true],
             'loginUrl' => ['site/login'],
             'idParam' => '__admin',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the boss
            'name' => 'advanced-boss',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
