<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone'=>'Asia/Bangkok',
    'language'=>'th',
    'name' => 'ระบบข้อมูลเขตสุขภาพที่ 7',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
