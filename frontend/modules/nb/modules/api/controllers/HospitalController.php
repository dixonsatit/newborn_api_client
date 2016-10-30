<?php

namespace frontend\modules\nb\modules\api\controllers;

use Yii;
use yii\data\ActiveDataProvider;

class HospitalController extends \yii\rest\ActiveController
{
    public $modelClass = 'frontend\modules\nb\modules\api\models\Hospital';

    public $serializer = [
       'class' => 'yii\rest\Serializer',
       'collectionEnvelope' => 'items',
    ];

    public function actions() {
        $actions = [
            'search' => [
                'class'       => 'frontend\modules\nb\modules\api\actions\SearchAction',
                'modelClass'  => $this->modelClass,
                'params'      => Yii::$app->request->get(),
                'likeField' => ['off_id','name']
            ],
            'find' => [
                'class'       => 'frontend\modules\nb\modules\api\actions\SearchAction',
                'modelClass'  => $this->modelClass,
                'params'      => Yii::$app->request->get(),
                'prepareDataProvider' => function($action, $model, $query, $modelClass){
                  $dataProvider = new ActiveDataProvider([
                    'query' => $query
                  ]);
                  $query->andWhere(' off_id LIKE :q OR name LIKE :q ', [
                          ':q' => '%'.Yii::$app->request->get('q').'%',
                  ]);
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
