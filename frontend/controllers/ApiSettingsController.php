<?php

namespace frontend\controllers;

use Yii;
use common\models\Setting;
use frontend\models\SettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\Model;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ApiSettingsController implements the CRUD actions for Setting model.
 */
class ApiSettingsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Setting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $settings = $this->findModelByHcode(Yii::$app->user->identity->profile->hcode);
        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                if($setting->value=='[null]'){
                  $setting->value = null;
                }
                $setting->save(false);
            }
            Yii::$app->session->setFlash('success', 'ตั้งค่าเชื่อมต่อฐานข้อมูลเสร็จเรียบร้อย..');
            return $this->redirect(['/api-settings/index']);
        }

        return $this->render('index', [
            'models' => $settings
        ]);
    }

    /**
     * Finds the Setting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelByHcode($id)
    {
        if (($models = Setting::find()->indexBy('id')->where(['hcode'=>$id])->all()) == []) {
          foreach (['host','database','username','password','driver'] as $key => $value) {
            $model = new Setting([
              'key'=> $value,
              'value' => NULL,
              'hcode' => Yii::$app->user->identity->profile->hcode
            ]);
            $model->save(false);
          }
          return Setting::find()->indexBy('id')->where(['hcode'=>$id])->all();
        } else {
          return $models;
        }
    }

}
