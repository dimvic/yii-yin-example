<?php

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once('protected/vendor/yiisoft/yii/framework/yii.php');
require_once('protected/vendor/autoload.php');
$app = Yii::createWebApplication('protected/config/main.php');

$app->run();
