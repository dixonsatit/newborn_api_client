<?php

namespace api\modules\kkh\modules\v1\controllers;

use Yii;
use api\components\ActiveController;
use yii\data\ActiveDataProvider;
use yii\web\Response;

class IpdInfController extends ActiveController
{
     public $modelClass = 'api\modules\kkh\modules\v1\models\IpdInf';

     public function actions() {
         $actions = [
             'search' => [
                 'class'       => 'api\components\actions\SearchAction',
                 'modelClass'  => $this->modelClass,
                 'checkAccess' => [$this, 'checkAccess'],
                 'params'      => Yii::$app->request->get(),
                 'likeField' => ['name']
             ]
         ];

         return array_merge(parent::actions(), $actions);
     }

     public function verbs() {
         $verbs = [
             'search'   => ['GET']
         ];
         return array_merge(parent::verbs(), $verbs);
     }


}
