<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute'=>'/nb/person/index',
    'modules'=>[
        // 'rbac' => [
        //     'class' => 'mdm\admin\Module',
        // ]
        'nb' => [
            'class' => 'frontend\modules\nb\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'admins' => ['admin'],
            'modelMap' => [
              'Profile' => 'common\models\Profile',
              'User' => 'common\models\user\User',
            ],
            'mailer' => [
                'sender' => ['ihospitallog@gmail.com' => 'ระบบข้อมูลสุขภาพที่ 7'],
                'welcomeSubject' => 'ยินดีต้อนรับสู่ระบบข้อมูลสุขภาพที่ 7',
                'confirmationSubject' => 'ยืนยันการลงทะเบียนระบบข้อมูลสุขภาพที่ 7',
                'reconfirmationSubject' => 'ส่งข้อมูลรหัสยืนยันเพื่อลงทะเบียนระบบข้อมูลสุขภาพที่ 7',
                'recoverySubject' => 'กู้คืนระหัสผ่านระบบข้อมูลสุขภาพที่ 7',
            ],
            'controllerMap' => [
                'settings' => 'frontend\controllers\user\SettingsController',
            ],
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            //'identityClass' => 'common\models\User',
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                 [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                      'nb/api/icdcode',
                      'nb/api/hospital'
                    ],
                    'extraPatterns' => [
                      'GET search' => 'search',
                      'GET icdnine' => 'icdnine',
                      'GET icdten' => 'icdten'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                    ],
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@common/views/user',
                ],
            ],
        ],
        
    ],
    // 'as access' => [
    //     'class' => 'mdm\admin\classes\AccessControl',
    //     'allowActions' => [
    //         'site/*',
    //         'rbac/*',
    //     ]
    // ],
    'params' => $params,

];
