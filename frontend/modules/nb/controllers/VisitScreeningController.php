<?php

namespace frontend\modules\nb\controllers;

use Yii;
use frontend\modules\nb\models\VisitScreening;
use frontend\modules\nb\models\Visit;
use frontend\modules\nb\models\VisitScreeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * VisitScreeningController implements the CRUD actions for VisitScreening model.
 */
class VisitScreeningController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all VisitScreening models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisitScreeningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VisitScreening model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VisitScreening model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($visit_id, $type)
    {
        $visit = $this->findModelVisit($visit_id);
        $models = [new VisitScreening([
          'visit_id' => $visit->visit_id,
          'patient_id' => $visit->patient_id,
          'type' => $type,
          'hospcode' => Yii::$app->user->identity->profile->hcode,
          'check_date' => date('d-m-').(date('Y')+543).date(' H:i')
        ])];

        if(!in_array($type,$models[0]->getItemsType())){
          throw new NotFoundHttpException('The requested type does not exist.');
        }

        if($type=='oae'){
          $view = 'oae';
        }
        elseif($type=='ivh'){
          $view = 'ivh';
        }
        elseif($type=='ivh'){
          $view = 'ivh';
        }
        elseif($type=='untrasound'){
          $view = 'untrasound';
        }
        elseif($type=='rop'){
          $view = 'rop';
        }
        else{
          $view = 'tshpku';
        }

        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
          \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
          $data=[];
          foreach ($models as $model) {
              $model->save(false);
              $data[] = $model->attributes;
          }
          return [
            'status' => 'success',
            'data' => $data
          ];
        } else {
            return $this->renderAjax($view, [
                'models' => $models,
            ]);
        }
    }

    /**
     * Updates an existing VisitScreening model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing VisitScreening model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $patient_visit = $model->patient_visit;
        $model->delete();
        return $this->redirect(['/nb/visit/screening','id'=>4,'visit_id'=>$patient_visit]);
    }

    /**
     * Finds the VisitScreening model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VisitScreening the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VisitScreening::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelVisit($id)
    {
        if (($model = Visit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
