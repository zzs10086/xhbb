<?php
/**
 * 缓存美女图片到七牛
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/30
 * Time: 16:35
 */
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\ByMoney;
use common\models\ByArticle;
use common\models\ByArticlePic;
use common\components\Util;

class CachepicController extends Controller{

    public function actionCache(){

        $limit = 1000;
        for ($i=1; $i<100; $i++){

           $offset = ($i-1)*$limit;

           $res = ByArticlePic::find()->select(['pic_url'])->offset($offset)->limit($limit)->asArray()->orderBy('id desc')->all();
           echo '<pre>'; print_r($res);exit;
        }
    }
}