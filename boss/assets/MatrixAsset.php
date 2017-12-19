<?php

namespace boss\assets;

use yii\web\AssetBundle;

/**
 * Main boss application asset bundle.
 */
class MatrixAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'matrix/css/bootstrap.min.css',
        'matrix/css/bootstrap-responsive.min.css',
        'matrix/css/matrix-style.css',
        'matrix/css/matrix-media.css',
        'matrix/font-awesome/css/font-awesome.css',
    ];
    public $js = [
        'matrix/js/jquery.min.js',
        'matrix/js/jquery.ui.custom.js',
        'matrix/js/bootstrap.min.js',
        'matrix/js/jquery.uniform.js',
        'matrix/js/select2.min.js',
        'matrix/js/jquery.dataTables.min.js',
        'matrix/js/matrix.js',
        'matrix/js/matrix.tables.js'
    ];
    public $depends = [

    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];
}
