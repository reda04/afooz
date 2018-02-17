<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.default.css',
        'css/morris.css ',
        'css/select2.css',
        'css/codemirror/codemirror.css',
        'css/codemirror/theme/ambiance.css',
    ];
      
    public $js = [
  
      //  'js/jquery-migrate-1.2.1.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap-wizard.min.js',
        'js/modernizr.min.js',
        'js/pace.min.js',
        'js/retina.min.js',
        'js/jquery.cookies.js',
        'js/jquery.sparkline.min.js',
        'js/morris.min.js',
        'js/raphael-2.1.0.min.js',
        'js/select2.min.js',
        'js/custom.js',
        'js/dashboard.js',
        'js/codemirror/codemirror.js',
        'js/codemirror/formatting.js',
        'js/codemirror/mode/xml.js',
        'js/codemirror/mode/javascript.js',
        'js/jquery-ui-1.10.3.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [ 'position' => \yii\web\View::POS_HEAD ];
}
