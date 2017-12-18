<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'zh-CN',
    'components' => [
        'request' => [
            'cookieValidationKey' => CEnv::COOKIE_VALIDATION_KEY
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => CEnv::REDIS_HOST,
                'port' => CEnv::REDIS_PORT,
                'password' => CEnv::REDIS_PASS,
                'database' => CEnv::REDIS_DATA_BASE,
              ],

        ],
        'session' => [
            'name' => 'checheng',
            'cookieParams' => ['path' => '/', 'domain' => CEnv::SESSION_DOMAIN],  //还可以设置`lifetime`, `path`, `domain`, `secure` and `httponly`
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@log/logs/' . $_SERVER['HTTP_HOST'] . '.log',
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => CEnv::DB_CHARSET,
            'tablePrefix' =>CEnv::DB_TABLEPREFIX, //model中添加了表名，这边不用设置表前缀了
            'username' => CEnv::DB_USER,
            'enableSchemaCache' => false,
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
        'CHostUrlManager' => [
            'class' => 'common\components\CHostUrlManager',
            'apps' => require('urlRule.php'),
        ],
        'urlManager' => [
            'class' => 'common\components\CUrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'cache' => 'filecacheclean',
        ],
        'oss' => [
            'class' => 'common\components\Aliyunoss',
            'accessKeyId' => 'LTAIhFTbuPZfjjFH',
            'accessKeySecret' => 'IUjt3GCJsMrdFE4VYtf7xQmXmGjhM9',
            'endPoint' => 'oss-cn-hangzhou.aliyuncs.com',
            'bucket' => 'img-oss-cdn',
            'link'=>'http://cdn.img.checheng.com'
        ],
         /*'wepay'=>[
               'class'=>'common\components\Wepay',//加载类库
               'appid'=>'wxef8d541f0ab2ea0c',
               'mch_id'=>'1491233452',
               'AppSecret'=>'7b3b744ed97a7653de8ad332ba8ad8d1',
               'key'=>'91d8db7adce76454cad3396e68a1c47b',
          ],*/

        'wepay'=>[
                'class'=>'common\components\Wepay',
                'accounts'=>[
                    //账号songjingjing@che.com
                    1=>[
                        'class'=>'common\components\Wepay',//加载类库
                        'appid'=>'wxef8d541f0ab2ea0c',
                        'mch_id'=>'1491233452',
                        'AppSecret'=>'7b3b744ed97a7653de8ad332ba8ad8d1',
                        'key'=>'91d8db7adce76454cad3396e68a1c47b',
                    ],
                    //t1@checheng.net
                    2=>[
                        'class'=>'common\components\Wepay',//加载类库
                        'appid'=>'wx9e7b4435f91ef640',
                        'mch_id'=>'1491233452',
                        'AppSecret'=>'56ea2c422f079d5ba2f1cbc8ce63d894',
                        'key'=>'91d8db7adce76454cad3396e68a1c47b',
                    ],
                    //t2@checheng.net
                    3=>[
                        'class'=>'common\components\Wepay',//加载类库
                        'appid'=>'wx81a27667cfae52a3',
                        'mch_id'=>'1491233452',
                        'AppSecret'=>'a937b4a19065301605e0636cb479f5b0',
                        'key'=>'91d8db7adce76454cad3396e68a1c47b',
                    ],
                ]
        ],
    ],
];
