<?php

namespace frontend\modules\nb\controllers;

use Yii;
use frontend\modules\nb\models\Hospital;
use frontend\modules\nb\models\Person;
use frontend\modules\nb\models\Icdcode;
use frontend\modules\nb\models\Refer;
use frontend\modules\nb\models\Visit;
use frontend\modules\nb\models\VisitSearch;
use frontend\modules\nb\models\VisitScreeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * VisitController implements the CRUD actions for Visit model.
 */
class VisitController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Visit models.
     *
     * @return mixed
     */
    public function actionIndex($id)
    {
        $person = $this->findModelPerson($id);
        $searchModel = new VisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $person->newborn_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'person' => $person,
        ]);
    }

    public function actionScreening($id, $visit_id)
    {
        $model = $this->findModel($visit_id);
        $person = $this->findModelPerson($id);
      //  $model->fieldToArray(['vaccine','disease','complication','procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
            return $this->redirect(['index', 'id' => $model->visit_id]);
        } else {
            list($tskSearchModel, $tskDataprovider) = $this->loadScreenDataprovider($visit_id, 'tshpku');
            list($oaeSearchModel, $oaeDataprovider) = $this->loadScreenDataprovider($visit_id, 'oae');
            list($ivhSearchModel, $ivhDataprovider) = $this->loadScreenDataprovider($visit_id, 'ivh');
            list($ropSearchModel, $ropDataprovider) = $this->loadScreenDataprovider($visit_id, 'rop');

            $tskDataprovider->pagination->pageParam = 'tsk-page';
            $tskDataprovider->sort->sortParam = 'tsk-sort';
            $oaeDataprovider->pagination->pageParam = 'oae-page';
            $oaeDataprovider->sort->sortParam = 'oae-sort';
            $ivhDataprovider->pagination->pageParam = 'ivh-page';
            $ivhDataprovider->sort->sortParam = 'ivh-sort';
            $ropDataprovider->pagination->pageParam = 'rop-page';
            $ropDataprovider->sort->sortParam = 'rop-sort';

            return $this->render('screening', [
                'model' => $model,
                'visit_id' => $visit_id,
                'id' => $id,
                'person' => $person,
                'tskSearchModel' => $tskSearchModel,
                'tskDataprovider' => $tskDataprovider,
                'oaeSearchModel' => $oaeSearchModel,
                'oaeDataprovider' => $oaeDataprovider,
                'ivhSearchModel' => $ivhSearchModel,
                'ivhDataprovider' => $ivhDataprovider,
                'ropSearchModel' => $ropSearchModel,
                'ropDataprovider' => $ropDataprovider,
            ]);
        }
    }

    public function actionDisease($id, $visit_id)
    {
        $model   = $this->findModel($visit_id);
        $person  = $this->findModelPerson($model->patient_id);
        $model->fieldToArray(['vaccine', 'disease', 'complication', 'procedure_code']);

        $initDisease = Icdcode::find()->findAllByCode($model->disease)->select(['CONCAT("(",`code`,") ",`description`)'])->indexBy('code')->column();
        $initComplication = Icdcode::find()->findAllByCode($model->complication)->select(['CONCAT("(",`code`,") ",`description`)'])->indexBy('code')->column();
        $initProcedureCode = Icdcode::find()->findAllByCode($model->procedure_code)->select(['CONCAT("(",`code`,") ",`description`)'])->indexBy('code')->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
            return $this->redirect(['disease', 'id' => $person->newborn_id, 'visit_id' => $model->visit_id]);
        } else {
            return $this->render('disease', [
                'model' => $model,
                'id' => $id,
                'person' => $person,
                'initDisease' => $initDisease,
                'initComplication' => $initComplication,
                'initProcedureCode'=> $initProcedureCode
            ]);
        }
    }

    public function actionDischarge($visit_id)
    {
        $model  = $this->findModel($visit_id);
        $person = $this->findModelPerson($model->patient_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->addRefer($model);
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
            return $this->redirect(['discharge', 'visit_id' => $model->visit_id]);
        } else {
            return $this->render('discharge', [
                'model' => $model,
                'person' => $person,
                'initReferHospital' => ArrayHelper::map($this->getHospitalsByCode($model->refer_hospcode), 'id', 'name'),
            ]);
        }
    }

    /**
     * Creates a new Visit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate($id,$refer_id=null)
    {
        $person = $this->findModelPerson($id);
        $refer = Refer::findOne($refer_id);
        $model = new Visit([
          'patient_id' => $person->newborn_id,
          'hospcode' => Yii::$app->user->identity->profile->hcode,
          'date' => date('d-m-').(date('Y') + 543),
          'age' => $person->getCurrentAge('birth'),
          'discharge_date' => '0000-00-00',
          'refer_date' => '0000-00-00',
          'refer_from_hospcode' => $refer !== null ? $refer->hospcode : null
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
              if($refer != null){
                $refer->updateAttributes([
                  'visit_id_accept'=>$model->visit_id,
                  'status' => Refer::STATUS_ACCEPT 
                ]);
              }
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
            return $this->redirect(['update', 'id' => $person->newborn_id, 'visit_id' => $model->visit_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'person' => $person
            ]);
        }
    }

    /**
     * Updates an existing Visit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id, $visit_id)
    {
        $person = $this->findModelPerson($id);
        $model = $this->findModel($visit_id);
        $model->fieldToArray(['vaccine', 'disease', 'complication', 'procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
            return $this->refresh();
        } else {
            return $this->render('update', [
                'model' => $model,
                'person' => $person

            ]);
        }
    }

    private function addRefer($visit){

      if(isset($visit->refer)){
        $model = $visit->refer;
        $model->refer_to = $visit->refer_hospcode;
        $model->refer_date  = $visit->refer_date;
      }else{
        $model = new Refer([
          'hospcode' => $visit->hospcode,
          'patient_id' => $visit->patient_id,
          'visit_id' => $visit->visit_id,
          'refer_to' => $visit->refer_hospcode,
          'refer_date' => $visit->refer_date,
          'status' => Refer::STATUS_SEND
        ]);
      }
      $model->save();
    }

    /**
     * Deletes an existing Visit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index','id'=>$model->patient_id]);
    }

    public function loadScreenDataprovider($visit_id, $type)
    {
        $searchModel = new VisitScreeningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $visit_id, $type);

        return [$searchModel, $dataProvider];
    }

    public function actionGetHospital()
    {
        $out = [];
        if (($parents = Yii::$app->request->post('depdrop_parents')) != null) {
            if ($parents != null) {
                $province_id = $parents[0];
                if ($province_id == 'R7') {
                    $province_id = ['40', '44', '45', '46'];
                }
                $out = $this->getHospitalsByProvince($province_id);
                echo Json::encode(['output' => $out, 'selected' => '']);

                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    protected function getHospitalsByProvince($id)
    {
        $datas = Hospital::find()->where(['provcode' => $id])->all();
        return $this->MapData($datas, 'off_id', 'name');
    }

    protected function getHospitalsByCode($id)
    {
        $datas = Hospital::find()->where(['Off_id' => $id])->all();
        return $this->MapData($datas, 'off_id', 'name');
    }

    protected function MapData($datas, $fieldId, $fieldName)
    {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }

        return $obj;
    }

    /**
     * Finds the Visit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return Visit the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Visit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelPerson($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
