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
class CareupAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/custom.css',
        'css/select.css',
        // 'css/carehome.css',
        'css/tab.css',
        'css/font-awesome-4.7.0/css/font-awesome.min.css',
        'css/materialize/css/materialize.css',
        'css/materialize/fonts/fonts.css',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
    ];
    public $js = [
    'js/service-and-skill-tags.js',
    'js/office-and-skill-timetable.js',
    'css/materialize/js/materialize.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        // 'yii\bootstrap\BootstrapAsset',
        // 'yii\bootstrap\BootstrapPluginAsset',
    ];
}
