<?php

use yii\helpers\Html;
use frontend\modules\nb\models\Refer;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\nb\models\ReferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนส่งต่อผู้ป่วย (Refer Out)';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="xpanel">

  <div class="xpanel-heading">
      <span class="xpanel-title">
        <i class="glyphicon glyphicon-export"></i> <?= Html::encode($this->title) ?>
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
              'attribute'=>'hospitalOutName',
              'format'=>'raw',
              'value' => function($model){
                return ($model->status==Refer::STATUS_ACCEPT ? '<i style="color:green;" class="glyphicon glyphicon-check">'.$model->hospitalOutName.'</i>' : '<i style="color:#FF9800;" class="glyphicon glyphicon-share-alt"></i>'.$model->hospitalOutName.'');
              }
            ],
            'personFullname',
            'refer_date:date',
            [
              'attribute' => 'status',
              'label'=>'สถานนะการส่ง',
              'filter'=> $searchModel->getItems('refer_status_out'),
              'value' => function($model){
                return $model->getItemsLabel('refer_status_out',$model->status);
              }
            ],
            // 'status',
            // 'irefer_id',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'refer_hospital_name',
            // [
            //   'header'=>'action',
            //   'format'=>'raw',
            //   'value'=>function($model){
            //     if($model->status==Refer::STATUS_ACCEPT){
            //       return Html::a(' <i class="glyphicon glyphicon-eye-open"></i> ดูรายละเอียด',[
            //         '/nb/visit/update',
            //         'id' => $model->patient_id,
            //         'visit_id' => $model->visit_id
            //       ],['class'=>'btn btn-default btn-sm','data'=>['pjax'=>'0']]);
            //     }else{
            //       return Html::a('<i class="glyphicon glyphicon-share-alt"></i> รับ Refer',[
            //         '/nb/visit/create',
            //         'id' => $model->patient_id,
            //         'refer_id' => $model->id
            //       ],['class'=>'btn btn-default btn-sm','data'=>['pjax'=>'0']]);
            //     }
            //   }
            // ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
