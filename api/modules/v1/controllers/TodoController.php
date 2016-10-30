<?php

namespace api\modules\v1\controllers;

use Yii;
use api\components\ActiveController;
use yii\web\Response;

class TodoController extends ActiveController
{
     public $modelClass = 'api\modules\v1\models\Todo';

     public function actions() {
         $actions = [
             'search' => [
                 'class'       => 'api\components\actions\SearchAction',
                 'modelClass'  => $this->modelClass,
                 'checkAccess' => [$this, 'checkAccess'],
                 'params'      => Yii::$app->request->get(),
                 'likeField' => ['title']
             ],
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
