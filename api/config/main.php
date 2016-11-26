<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'hosxp' => [
            'class' => 'api\modules\hosxp\Module',
        ],
        'kkh' => [
            'class' => 'api\modules\kkh\Module',
        ],
        'jhcis' => [
            'class' => 'api\modules\jhcis\Module',
        ],
        'medeesoft' => [
            'class' => 'api\modules\medeesoft\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'admins' => ['admin'],
            'modelMap' => [
              'Profile' => 'common\models\Profile',
              'User' => 'common\models\user\User',
            ],
        ],
    ],
    'components' => [
         'api' => function(yii\web\User $user){
             $db = \common\models\Setting::loadConfig($user->identity->profile->hcode);
             return $db;
         },
        /*'api' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.0.218;dbname=hospdata',
            'username' => 'user1',
            'password' => 'user123',
            'charset' => 'utf8',
        ],*/
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            //'identityClass' => 'common\models\User',
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
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
        'urlManager' => require(__DIR__ . '/_urlManager.php'),
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@common/views/user',
                ],
            ],
        ],

    ],
    'params' => $params,
];
