<?php

namespace frontend\modules\nb\modules\api\actions;

use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\Action;

/**
 * @referent http://stackoverflow.com/questions/25522462/yii2-rest-query#answer-25618361
 */

class SearchAction extends Action {

    /**
     * @var callable a PHP callable that will be called to prepare a data provider that
     * should return a collection of the models. If not set, [[prepareDataProvider()]] will be used instead.
     * The signature of the callable should be:
     *
     * ```php
     * function ($action) {
     *     // $action is the action object currently running
     * }
     * ```
     *
     * The callable should return an instance of [[ActiveDataProvider]].
     */
    public $prepareDataProvider;

    public $params;

    public $likeField = [];

    public $queryParamsName = 'q';

    public $queryCondition;

    /**
     * @return ActiveDataProvider
     */
    public function run() {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        return $this->prepareDataProvider();
    }

    /**
     * Prepares the data provider that should return the requested collection of the models.
     * @return ActiveDataProvider
     */
    protected function prepareDataProvider() {

        $modelClass = $this->modelClass;
        $model      = new $this->modelClass();
        $query      = $modelClass::find();

        if ($this->prepareDataProvider !== null) {
            return call_user_func($this->prepareDataProvider, $this, $model, $query, $modelClass);
        }

        if(!$this->params){
          throw new \yii\web\HttpException(400, 'There are no query string');
        }

        $this->removeConflictParams([
          'access-token',
          'page'
        ]);

        $dataProvider = new ActiveDataProvider([
          'query' => $query
        ]);

        $params = $this->getSearchParams($model);
        if (empty($params)) {
            return $dataProvider;
        }

        foreach ($params as $param => $value) {
            if(in_array($param, $this->likeField)){
              $query->andFilterWhere(['like',$param,$value]);
            }else{
              $query->andFilterCompare($param,$value);
            }
        }

        return $dataProvider;
    }

    private function removeConflictParams($params){
      foreach ($params as $key => $value) {
        if(array_key_exists($value, $this->params)){
          unset($this->params[$value]);
        }
      }
    }

    private function getSearchParams($model){
      $params = [];
      foreach($this->params as $key => $value){
          if (!$model->hasAttribute($key)) {
              throw new \yii\web\HttpException(404, 'Invalid attribute:' . $key);
          }
          if(in_array($key, $model->safeAttributes())){
             $params[$key] = $value;
          }
      }
      return $params;
    }

}
