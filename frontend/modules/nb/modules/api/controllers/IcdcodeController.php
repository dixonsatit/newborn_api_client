<?php

namespace frontend\modules\nb\modules\api\controllers;

use Yii;
use yii\data\ActiveDataProvider;

class IcdcodeController extends \yii\rest\ActiveController
{
    public $modelClass = 'frontend\modules\nb\modules\api\models\Icdcode';

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
                'likeField' => ['code','description']
            ],
            'icdten' => [
                'class'       => 'frontend\modules\nb\modules\api\actions\SearchAction',
                'modelClass'  => $this->modelClass,
                'params'      => Yii::$app->request->get(),
                'prepareDataProvider' => function($action, $model, $query, $modelClass){
                  $dataProvider = new ActiveDataProvider([
                    'query' => $query
                  ]);
                  $query->icd10()->andWhere(' code LIKE :q OR description LIKE :q ', [
                          ':q' => '%'.Yii::$app->request->get('q').'%',
                  ]);
                  return $dataProvider;
                }
            ],
            'icdnine' => [
                'class'       => 'frontend\modules\nb\modules\api\actions\SearchAction',
                'modelClass'  => $this->modelClass,
                'params'      => Yii::$app->request->get(),
                'prepareDataProvider' => function($action, $model, $query, $modelClass){
                  $dataProvider = new ActiveDataProvider([
                    'query' => $query
                  ]);
                  $query->icd9()->andWhere(' code LIKE :q OR description LIKE :q ', [
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
