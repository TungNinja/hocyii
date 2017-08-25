<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/reset.css',
        'css/responsive.css',
        'css/main.css',
        'css/bootstrap.css',
        'css/bootstrap.min.css'
    ];
    public $js = [
        'js/jquery.js',
        //'js/main.js',
        'js/function.js',
        'js/bootstrap.js',
        'js/bootstrap.min.js'
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
