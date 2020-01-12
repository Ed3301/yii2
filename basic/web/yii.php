<?php
    defined('YII_DEBUG') or define('YII_DEBUG', true);

    // fcgi doesn't have STDIN defined by default
    defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

    require(__DIR__ . '../vendor/autoload.php');
    require(__DIR__ . '../vendor/yiisoft/yii2/yii/Yii.php');

    $config = require(__DIR__ . '../config/console.php');

    $application = new yii\console\Application($config);
    $exitCode = $application->run();
    exit($exitCode);