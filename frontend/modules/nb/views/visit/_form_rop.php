<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>

 <div class="xpanel" >
   <div class="xpanel-heading-sm">
       <span class="xpanel-title">
         <i class="fa fa-stethoscope"></i> ROP Screening
       </span>
       <span class="pull-right"> <?= Html::a('  <i class="glyphicon glyphicon-plus"></i> เพิ่ม',['/nb/visit-screening/create','id'=>$id,'visit_id'=>$model->visit_id,'type'=>'rop'],[
       'class'=>'btn-modal btn btn-primary pull-right',
       'data'=>['type'=>'rop']
       ]);?></span>
   </div>
   <div class="panel-body person-form" >

<?php Pjax::begin([
  'id'=>'pjax-rop'
]); ?>
<?= GridView::widget([
        'id'=>'grid-rop',
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

            'rop_left',
            'rop_right',
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
