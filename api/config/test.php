<?php
$config =  yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/common/config/test.php'),
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    [
        'id' => 'api-tests',
    ]
);

return $config;
