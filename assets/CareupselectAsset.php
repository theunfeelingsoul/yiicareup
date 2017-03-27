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
class CareupselectAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/carehome.css',
        'css/tab.css',
        'css/select.css',
        'css/victor.css',
        'css/font-awesome-4.7.0/css/font-awesome.min.css',
        'jquery.datepick.package-5.1.0/css/jquery.datepick.css'
    ];
    public $js = [
    'js/service-and-skill-tags.js',
    'js/office-and-skill-timetable.js',
    'js/select.js',
    'js/plugin-inits.js',
    'js/plugin-select.js',
    'js/custom.js',
    'jquery.datepick.package-5.1.0/js/jquery.plugin.js',
    'jquery.datepick.package-5.1.0/js/jquery.datepick.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',  
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',

    ];
}
