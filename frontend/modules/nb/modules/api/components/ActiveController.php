<?php

namespace frontend\modules\nb\modules\api\components;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController as BaseActiveController;
use common\models\User;


class ActiveController extends BaseActiveController
{

  public $serializer = [
     'class' => 'yii\rest\Serializer',
     'collectionEnvelope' => 'items',
  ];

  public function behaviors()
  {
       $default = [
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
      ];

       return ArrayHelper::merge(parent::behaviors(), Yii::$app->params['authenMode'] == 'oauth2server' ? $oauth2server : $default);
  }

}
