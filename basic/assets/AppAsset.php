<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap-datetimepicker.min.css',
        'css/font-awesome.min.css',
        'css/bootstrap.min.css',//ToDo
        'css/flexslider.css',
        'css/templatemo-style.css',
    ];
    public $js = [
        'js/jquery-1.11.2.min.js',
        'js/moment.js',
        'js/bootstrap.min.js',
//        'js/bootstrap-datetimepicker.min.js',
        'js/jquery.flexslider-min.js',
        'js/templatemo-script.js',
        'js/site.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
