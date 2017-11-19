<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/30
 * Time: 14:25
 */
namespace api\controllers;
use yii\web\Controller;
use common\models\ByMoney;

class TestController extends Controller
{
    public function actionIndex()
    {
        echo 'test';
        $res = ByMoney::find()->one()->toArray();
        echo '<pre>';print_r($res);
    }
}