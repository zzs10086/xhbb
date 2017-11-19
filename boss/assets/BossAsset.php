<?php

namespace boss\assets;

use yii\web\AssetBundle;

/**
 * Main boss application asset bundle.
 */
class BossAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
         //'css/site.css',
         'css/plugins/daterangepicker/daterangepicker.css',
         'css/adminlite/dist/AdminLTE.min.css',
         'css/adminlite/dist/style.css',
         'css/adminlite/dist/_all-skins.min.css',
         'css/common.css',
         'js/plugins/layer/skin/default/layer.css'
    ];
    public $js = [
         'js/plugins/jQuery/jquery-2.2.3.min.js',
         'js/bootstrap/bootstrap.min.js',
         'js/plugins/slimScroll/jquery.slimscroll.min.js',
         'js/plugins/fastclick/fastclick.js',
         'js/adminlite/dist/app.js',
         'js/plugins/daterangepicker/moment.min.js',
         'js/plugins/daterangepicker/daterangepicker.js',
         'js/plugins/layer/layer.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
         'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];
}
