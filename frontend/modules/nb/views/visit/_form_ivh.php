<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>


 <div class="xpanel" >
   <div class="xpanel-heading-sm">
       <span class="xpanel-title">
         <i class="fa fa-stethoscope"></i> IVH Screening
       </span>
       <span class="pull-right">  <?= Html::a('  <i class="glyphicon glyphicon-plus"></i> เพิ่ม',['/nb/visit-screening/create','visit_id'=>$model->visit_id,'type'=>'ivh'],[
       'class'=>'btn-modal btn btn-primary pull-right btn-sm ',
       'data'=>['type'=>'ivh']
       ]);?>
     </span>
   </div>
   <div class="panel-body" >


<?php Pjax::begin([
  'id'=>'pjax-ivh'
]); ?>
<?= GridView::widget([
        'id'=>'grid-ivh',
        'dataProvider' => $dataProvider,
        //'filterModel'  => $searchModel,
        'tableOptions'=>['class'=>'table table-striped'],
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn','options'=>['style'=>'width:30px;']],
            [
              'attribute' => 'check_date',
              'format' => 'raw',
              'options' => ['style'=>'width:150px;'],
              'value' => function($model){
                return Html::a($model->check_date,[
                    '/nb/visit-screening/create',
                    'visit_id' => $model->visit_id,
                    'type' => 'ivh',
                    'id' => $model->id
                  ],['class'=>'btn-modal','data'=>['pjax'=>'0']]);
              }
            ],
            'ivhGradeLabel',
            'ivh',
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
