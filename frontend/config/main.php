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
    'as access' => [
        'class' => 'common\components\ProfileFilter',
        'allowActions' => [
            'site/*',
            'user/*',
        ]
    ],
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
                'sender' => ['newborn.kkh@gmail.com' => 'ระบบข้อมูลสุขภาพที่ 7'],
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
                    'class' => 'yii\log\DbTarget',
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
                'signup' => '/user/registration/register',
                'login' => '/user/security/login',
                'logout' => '/user/security/logout',
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
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'web_path' => '@web', // path alias to web base
            'base_path' => '@webroot', // path alias to web base
            'minify_path' => '@webroot/minify', // path alias to save minify result
            'js_position' => [\yii\web\View::POS_END], // positions of js files to be minified
            'force_charset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expand_imports' => true, // whether to change @import on content
            'compress_output' => true, // compress result html page
            'compress_options' => ['extra' => true], // options for compress
            'concatCss' => true, // concatenate css
            'minifyCss' => true, // minificate css
            'concatJs' => true, // concatenate js
            'minifyJs' => true, // minificate js
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@common/views/user',
                ],
            ],
        ],
        
    ],
    'params' => $params,

];
