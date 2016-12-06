<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone'=>'Asia/Bangkok',
    'language'=>'th',
    'name' => 'ระบบข้อมูลเขตสุขภาพที่ 7',
    'components' => [
        'cache' => [
            'class' => 'yii\redis\Cache'
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ],
    ],
];
