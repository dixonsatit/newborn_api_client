<?php

namespace api\modules\jhcis\modules\v1\controllers;

use Yii;
use api\components\ActiveController;
use yii\data\ActiveDataProvider;
use yii\web\Response;

class PatientController extends ActiveController
{
     public $modelClass = 'api\modules\jhcis\modules\v1\models\Person';

     public function actions() {
         $actions = [
             'search' => [
                 'class'       => 'api\components\actions\SearchAction',
                 'modelClass'  => $this->modelClass,
                 'checkAccess' => [$this, 'checkAccess'],
                 'params'      => Yii::$app->request->get(),
                 'likeField' => ['name']
             ],
             'list' => [
                'class'       => 'api\components\actions\SearchAction',
                'modelClass'  => $this->modelClass,
                'params'      => Yii::$app->request->get(),
                'prepareDataProvider' => function($action, $model, $query, $modelClass){

                  $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'sort' => [
                        'defaultOrder' => ['pid' => SORT_DESC]
                    ]
                  ]);

                  $q = Yii::$app->request->get('q');
                  $param = explode(' ',$q);
                  $count = count($param);
                  if($count > 1){
                        list($fname,$lname) = $param;
                        $query->andWhere(' fname LIKE :fname AND lname LIKE :lname', [
                          ':fname' => ''.$fname.'%',
                          ':lname' => ''.$lname.'%'
                        ]);
                    }else{
                        if((int)$q > 0){
                            $query->andFilterWhere([
                                'pid' => $q
                            ]);
                        }else{
                            $query->andWhere('fname LIKE :q OR lname LIKE :q', [
                                ':q' => ''.Yii::$app->request->get('q').'%',
                            ]);
                        }
                    }

                  return $dataProvider;
                }
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
