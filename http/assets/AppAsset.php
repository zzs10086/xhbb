<?php

namespace http\assets;

use yii\web\AssetBundle;

/**
 * Main api application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@static';
    public $baseUrl =\CEnv::STATIC_RESOURCE;
    public $css = [
        'beauty/css/style.css',
    ];
    public $js = [
         'beauty/js/jquery-1.7.2.min.js',
    ];
    public $depends = [

    ];
}
