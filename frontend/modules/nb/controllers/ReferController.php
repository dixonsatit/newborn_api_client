<?php

namespace frontend\modules\nb\controllers;

use Yii;
use frontend\modules\nb\models\Refer;
use frontend\modules\nb\models\ReferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ReferController implements the CRUD actions for Refer model.
 */
class ReferController extends Controller
{
    public $defaultAction = 'in';

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
     * Lists all Refer models.
     * @return mixed
     */
    public function actionIn()
    {
        $searchModel = new ReferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'in');

        return $this->render('in', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Refer models.
     * @return mixed
     */
    public function actionOut()
    {
        $searchModel = new ReferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'out');

        return $this->render('out', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Displays a single Refer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model  = $this->findModel($id);
        return $this->render($model->isOwnHospital ? 'view_out' : 'view_in', [
            'model' => $model
        ]);
    }

    /**
     * Creates a new Refer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Refer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Refer model.
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
     * Deletes an existing Refer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Refer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Refer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Refer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
