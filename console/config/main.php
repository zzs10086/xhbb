<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => CEnv::DB_CHARSET,
            'tablePrefix' =>CEnv::DB_TABLEPREFIX, //model中添加了表名，这边不用设置表前缀了
            'username' => CEnv::DB_USER,
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600 * 24,
            'schemaCache' => 'filecacheclean',
            'password' => CEnv::DB_PASS,
            'dsn' => 'mysql:host=' . CEnv::DB_HOST_MASTER . ':' . CEnv::DB_PORT . ';dbname=' . CEnv::DB_DBNAME,
            'slaveConfig' => [// 配置从服务器
                'username' => CEnv::DB_USER,
                'password' => CEnv::DB_PASS,
                'attributes' => [
                    PDO::ATTR_TIMEOUT => 10,// use a smaller connection timeout
                ],
            ],
            'slaves' => [
                ['dsn' => 'mysql:host=' . CEnv::DB_HOST_SLAVE . ':' . CEnv::DB_PORT . ';dbname=' . CEnv::DB_DBNAME],
            ],

        ],
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . CEnv::DB_HOST_MASTER . ':' . CEnv::DB_PORT . ';dbname=car_crm', //CRM数据库
            'username' => CEnv::DB_USER,
            'password' => CEnv::DB_PASS,
            'charset' => CEnv::DB_CHARSET,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@log/logs/log(' . $_SERVER['HTTP_HOST'] . ').log',
                ],
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => CEnv::REDIS_HOST,
            'port' => CEnv::REDIS_PORT,
            'password' => CEnv::REDIS_PASS,
            'database' => CEnv::REDIS_DATA_BASE,
        ],
    ],
    'params' => $params,
];
//return \yii\helpers\ArrayHelper::merge($config, require(__DIR__ . '/../../common/config/' . YII_ENV . '.php'));