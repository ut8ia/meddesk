<?php
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

define('ROOT_PATH', dirname(dirname(dirname(dirname(realpath(__DIR__))))) . '/');

require(ROOT_PATH . '/../vendor/autoload.php');
require(ROOT_PATH . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(ROOT_PATH . '/../config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php')
);

$application = new yii\web\Application($config);
$application->on(yii\web\Application::EVENT_BEFORE_REQUEST, function(yii\base\Event $event) {
    $event->sender->response->on(yii\web\Response::EVENT_BEFORE_SEND, function($e) {
        ob_start("ob_gzhandler");
    });
    $event->sender->response->on(yii\web\Response::EVENT_AFTER_SEND, function($e) {
        ob_end_flush();
    });
});
$application->run();
