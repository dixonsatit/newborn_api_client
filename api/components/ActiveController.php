<?php

namespace api\components;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController as BaseActiveController;
use dixonsatit\yii2\oauth2server\filters\ErrorToExceptionFilter;
use common\models\User;
use yii\filters\Cors;


class ActiveController extends BaseActiveController
{

  public $serializer = [
     'class' => 'yii\rest\Serializer',
     'collectionEnvelope' => 'items',
  ];

  public function behaviors()
  {
       return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => explode(',',getenv('ALLOW_ORIGIN')),
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
                    'Access-Control-Allow-Credentials' => false
                ],
            ],
            'authenticator' => [
                'class' => \yii\filters\auth\CompositeAuth::className(),
                'authMethods' => [
                    [
                      'class' => HttpBasicAuth::className(),
                      'auth'=>function($username, $password){
                         $user = User::findByUsername($username);
                         if($user != null && $user->validatePassword($password))
                         {
                           return $user;
                         }else{
                           return false;
                         }
                      }
                    ],
                    ['class' => HttpBearerAuth::className()],
                    ['class' => QueryParamAuth::className()],
                ]
            ],
      ]);
  }

}
