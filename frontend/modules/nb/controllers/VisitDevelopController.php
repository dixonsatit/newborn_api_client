<?php

namespace frontend\modules\nb\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use frontend\modules\nb\models\DevItem;
use frontend\modules\nb\models\DevItemGroup;
use frontend\modules\nb\models\Person;
use frontend\modules\nb\models\Visit;
use frontend\modules\nb\models\VisitDevelop;
use frontend\modules\nb\models\VisitDevelopSearch;

/**
 * VisitDevelopController implements the CRUD actions for VisitDevelop model.
 */
class VisitDevelopController extends Controller
{
    private $_devGroup = null;
    private $_devItems = null;
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
     * Creates a new VisitDevelop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate($visit_id)
    {
        $visit = $this->findModelVisit($visit_id);
        $person = $this->findModelPerson($visit->patient_id);
        $models = $this->initModels($visit_id, $person->newborn_id);

        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            foreach ($models as $model) {
                if ($model->id > 0 && $model->develop_no == 0) {
                    $model->delete();
                }
                if ($model->develop_no > 0) {
                    $model->save(false);
                }
            }

            Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');

            return $this->redirect(['create', 'visit_id' => $model->visit_id]);
        } else {
            return $this->render('create', [
              'visit' => $visit,
              'person' => $person,
              'models' => $models,
          ]);
        }
    }

    public function initModels($visit_id, $patient_id)
    {
        $models = VisitDevelop::find()
                  ->select([
                    'VisitDevelop.*',
                    'labelName' => 'lib_dev_item.item_name',
                    'itemCode' => 'lib_dev_item.id',
                    'groupCode' => 'lib_dev_item.ref',
                    'groupName' => 'lib_dev_item_group.name_group',
                  ])
                  ->from(['VisitDevelop' => VisitDevelop::find()->byVisitId($visit_id)])
                  ->joinWith([
                    'devItems' => function ($q) {
                        $q->joinWith('devItemGroup');
                    },
                  ], true, 'RIGHT JOIN')
                  ->orderBy('lib_dev_item.ref ASC, lib_dev_item.id ASC')
                  ->all();

        foreach ($models as $key => $model) {
            if (empty($model->id)) {
                $models[$key] = new VisitDevelop([
              'visit_id' => $visit_id,
              'patient_id' => $patient_id,
              'hospcode' => Yii::$app->user->identity->profile->hcode,
              'age_group' => $model->groupCode,
              'groupName' => $model->groupName,
              'labelName' => $model->labelName,
              'itemCode' => $model->itemCode,
              'develop_no' => 0,
            ]);
            }
        }

        return $models;
    }

    public function getDevGroup()
    {
        if ($this->_devGroup == null) {
            $this->_devGroup = DevItemGroup::find()->joinWith([
              'devItems' => function ($q) {
                  $q->indexBy('id');
              },
            ])->all();
        }

        return $this->_devGroup;
    }

    public function getDevItems()
    {
        if ($this->_devItems == null) {
            $this->_devItems = DevItem::find()->joinWith(['devItemGroup'])->indexBy('id')->all();
        }

        return $this->_devItems;
    }

    public function getDevItemGroup($item_id)
    {
        return array_key_exists($item_id, $this->getDevItems()) ? $this->_devItems[$item_id]->ref : null;
    }

    /**
     * Updates an existing VisitDevelop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int    $visit_id
     * @param string $age_group
     * @param string $develop_no
     *
     * @return mixed
     */
    public function actionUpdate($visit_id, $age_group, $develop_no)
    {
        $model = $this->findModel($visit_id, $age_group, $develop_no);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'visit_id' => $model->visit_id, 'age_group' => $model->age_group, 'develop_no' => $model->develop_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the VisitDevelop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int    $visit_id
     * @param string $age_group
     * @param string $develop_no
     *
     * @return VisitDevelop the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($visit_id, $age_group, $develop_no)
    {
        if (($model = VisitDevelop::findOne(['visit_id' => $visit_id, 'age_group' => $age_group, 'develop_no' => $develop_no])) !== null) {
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

    protected function findModelPerson($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
