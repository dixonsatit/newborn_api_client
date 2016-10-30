<?php

use yii\helpers\Html;
use frontend\modules\nb\models\Refer;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\nb\models\ReferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนรับผู้ป่วย (Refer In)';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="xpanel">

  <div class="xpanel-heading">
      <span class="xpanel-title">
        <i class="glyphicon glyphicon-import"></i> <?= Html::encode($this->title) ?>
      </span>
      
  </div>

  <div class="panel-body refer-index">
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'hospitalName',
              'format'=>'raw',
              'value' => function($model){
                return ($model->status==Refer::STATUS_ACCEPT ? '<i style="color:green;" class="glyphicon glyphicon-check">'.$model->hospitalName.'</i>' : '<i class="glyphicon glyphicon-time">'.$model->hospitalName.'</i>');
              }
            ],
            'personFullname',
            'refer_date:date',

            // 'status',
            // 'irefer_id',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'refer_hospital_name',
            [
              'header'=>'action',
              'format'=>'raw',
              'value'=>function($model){
                if($model->status==Refer::STATUS_ACCEPT){
                  return Html::a(' <i class="glyphicon glyphicon-eye-open"></i> ดูรายละเอียด',[
                    '/nb/visit/update',
                    'id' => $model->patient_id,
                    'visit_id' => $model->visit_id
                  ],['class'=>'btn btn-default btn-sm','data'=>['pjax'=>'0']]);
                }else{
                  return Html::a('<i class="glyphicon glyphicon-share-alt"></i> รับ Refer',[
                    '/nb/visit/create',
                    'id' => $model->patient_id,
                    'refer_id' => $model->id
                  ],['class'=>'btn btn-default btn-sm','data'=>['pjax'=>'0']]);
                }
              }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
