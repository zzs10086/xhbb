<?php
exit;
require(__DIR__ . '/../../common/components/CEnv.php');

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');


$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../config/main.php')

);

//脚手架
/*$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = 'yii\gii\Module';*/
(new yii\web\Application($config))->run();
