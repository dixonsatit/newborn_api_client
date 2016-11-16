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
             ],
            'list' => [
                'class'       => 'api\components\actions\SearchAction',
                'modelClass'  => $this->modelClass,
                'params'      => Yii::$app->request->get(),
                'prepareDataProvider' => function($action, $model, $query, $modelClass){

                  $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'sort' => [
                        'defaultOrder' => ['lastupdate' => SORT_DESC]
                    ]
                  ]);

                  $q = Yii::$app->request->get('q');
                  $param = explode(' ',$q);
                  $count = count($param);
                  if($count > 1){
                        list($fname,$lname) = $param;
                        // $query->andWhere(' name LIKE :fname AND surname LIKE :lname', [
                        //   ':fname' => ''.$fname.'%',
                        //   ':lname' => ''.$lname.'%'
                        // ]);
                    }else{
                        if((int)$q > 0){
                            $query->andFilterWhere([
                                'hn' => $q
                            ]);
                        }else{
                            // $query->andWhere('name LIKE :q OR surname LIKE :q', [
                            //     ':q' => ''.Yii::$app->request->get('q').'%',
                            // ]);
                        }
                    }

                  return $dataProvider;
                }
            ],
         ];

         $parentActions = parent::actions();
         unset($parentActions['delete'], $parentActions['create'],$parentActions['update']);
         return array_merge(parent::actions(), $actions);
     }

     public function verbs() {
         $verbs = [
             'search'   => ['GET']
         ];
         return array_merge(parent::verbs(), $verbs);
     }


}
