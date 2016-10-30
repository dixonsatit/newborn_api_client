<?php

namespace frontend\controllers\user;


use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\modules\nb\models\Hospital;
use dektrium\user\controllers\SettingsController as BaseSettingsController;



class SettingsController extends BaseSettingsController
{

  /** @inheritdoc */
  public function behaviors()
  {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'disconnect' => ['post'],
              ],
          ],
          'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'allow'   => true,
                      'actions' => ['profile', 'account', 'networks', 'disconnect','get-hospital'],
                      'roles'   => ['@'],
                  ],
                  [
                      'allow'   => true,
                      'actions' => ['confirm'],
                      'roles'   => ['?', '@'],
                  ],
              ],
          ],
      ];
  }

  /**
   * Shows profile settings form.
   *
   * @return string|\yii\web\Response
   */
  public function actionProfile()
  {
      $model = $this->finder->findProfileById(Yii::$app->user->identity->getId());

      if ($model == null) {
          $model = Yii::createObject(Profile::className());
          $model->link('user', Yii::$app->user->identity);
      }

      $event = $this->getProfileEvent($model);

      $this->performAjaxValidation($model);

      $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $event);
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Your profile has been updated'));
          $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
          return $this->refresh();
      }

      return $this->render('profile', [
          'model' => $model,
          'hospital'=> ArrayHelper::map($this->getHospitalsByCode($model->hcode),'id','name')
      ]);
  }


  public function actionGetHospital() {
        $out = [];
        if (($parents = Yii::$app->request->post('depdrop_parents'))!=null) {
            if ($parents != null) {
                $province_id = $parents[0];
                if($province_id=='R7'){
                  $province_id = ['40','44','45','46'];
                }
                $out = $this->getHospitalsByProvince($province_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
  }

  protected function getHospitalsByProvince($id){
      $datas = Hospital::find()->where(['provcode'=>$id])->all();
      return $this->MapData($datas,'off_id','name');
  }
  protected function getHospitalsByCode($id){
      $datas = Hospital::find()->where(['Off_id'=>$id])->all();
      return $this->MapData($datas,'off_id','name');
  }


  protected function MapData($datas,$fieldId,$fieldName){
      $obj = [];
      foreach ($datas as $key => $value) {
          array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
      }
      return $obj;
  }
}
