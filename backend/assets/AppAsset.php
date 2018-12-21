<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot'; //被包含资源的根目录
    public $baseUrl = '@web'; //被包含资源的URL
    public $css = [
        'css/site.css', //根目录下/css/site.css
    ];
    public $js = [
    ];
    public $depends = [ //被依赖的资源优先加载
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
