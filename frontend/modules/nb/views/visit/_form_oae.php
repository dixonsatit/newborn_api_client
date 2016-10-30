<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>

<div class="xpanel" >
  <div class="xpanel-heading-sm">
     <span class="xpanel-title">
      <i class="fa fa-stethoscope"></i> OAE Screening
     </span>
     <span class="pull-right">
        <?= Html::a('  <i class="glyphicon glyphicon-plus"></i> เพิ่ม',['/nb/visit-screening/create','id'=>$id,'visit_id'=>$model->visit_id,'type'=>'oae'],[
          'class'=>'btn-modal btn btn-primary pull-right btn-sm ',
          'data'=>['type'=>'tsh-oae']
       ]);?>
   </span>
  </div>
<div class="panel-body person-form" >
  <?php Pjax::begin(['id'=>'pjax-oae']); ?>

  <?= GridView::widget([
        'id'=>'grid-oae',
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'tableOptions'=>['class'=>'table table-striped'],
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn','options'=>['style'=>'width:30px;']],
            [
              'attribute'=>'check_date',
              'format'=>'dateTime',
              'options'=>['style'=>'width:150px;']
            ],

            'oae_left',
            'oae_right',
            [
              'class' => 'yii\grid\ActionColumn',
              'controller'=>'visit-screening',
              'template'=>'{delete}'
            ],
        ],
    ]); ?>

  <?php Pjax::end(); ?>
</div>
</div>
