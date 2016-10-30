<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\nb\models\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'ข้อมูลการตรวจ ('.$person->fullName.')';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['/nb/person/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_menus',[
    'id' => $person->newborn_id
])?>
<div class="xpanel-tab visit-index">

  <div class="xpanel-heading">

      <span class="xpanel-title">
        ข้อมูลการตรวจ
      </span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.' ลงทะเบียนตรวจ', ['create','id'=>$person->newborn_id], ['class' => 'btn btn-success pull-right']) ?>
  </div>

  <div class="panel-body person-index">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions'=>[
              'class'=>'table'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'date:dateTime',
                [
                  'attribute'=>'date',
                  'format'=>'raw',
                  'value' => function($model){
                    return  Html::a(($model->isOwnHospital? '<i class="glyphicon glyphicon-ok-circle"></i> ':null).Yii::$app->formatter->asDate($model->date),['update','id'=> $model->patient_id,'visit_id'=>$model->visit_id],[
                      'style'=> $model->isOwnHospital?'color:#1799dd;': '',
                      'data'=>['pjax'=>'0']
                    ]);
                  }
                ],
                'hospitalName',
                // 'clinic',
                // 'pttype',
                // 'age',
                // 'age_type',
                // 'result',
                // 'referin',
                // 'referout',
                // 'head_size',
                // 'height',
                // 'weight',
                // 'waist',
                // 'bp_max',
                // 'bp_min',
                // 'inp_id',
                // 'lastupdate',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'options'=>['style'=>'width:400px;'],
                    'template' => '<div class="btn-group btn-group-sm text-center" role="group">{vaccine} {clinic}  {icd10} {development} {delete}</div>',
                    'buttonOptions'=>['class'=>'btn btn-default'],
                    'visibleButtons'=>[
                      'delete'=>function ($model, $key, $index) {
                         return $model->isOwnHospital == true;
                      }
                    ],
                    'buttons' => [
                        'vaccine' => function ($url, $model, $key) {
                            return Html::a('<i class=""></i> ประวัติ', ['/nb/visit/update', 'id'=>$model->patient_id,'visit_id' => $model->visit_id], ['class' => 'btn  btn-default','data'=>['pjax'=>'0']]);
                        },
                        'clinic' => function ($url, $model, $key) {
                            return Html::a('<i class=""></i> คัดกรอง', ['/nb/visit/screening', 'id'=>$model->patient_id,'visit_id' => $model->visit_id], ['class' => 'btn  btn-default','data'=>['pjax'=>'0']]);
                        },
                        'icd10' => function ($url, $model, $key) {
                            return Html::a('<i class=""></i> โรคและหัตถการ', ['/nb/visit/disease', 'id'=>$model->patient_id,'visit_id' => $model->visit_id], ['class' => 'btn  btn-default','data'=>['pjax'=>'0']]);
                        },
                        'development' => function ($url, $model, $key) {
                            return Html::a('<i class=""></i> ข้อมูลพัฒนาการ', ['/nb/visit-develop/create','visit_id' => $model->visit_id], ['class' => 'btn  btn-default','data'=>['pjax'=>'0']]);
                        }
                    ]
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
  </div>
  </div>
