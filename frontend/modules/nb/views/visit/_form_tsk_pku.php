<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>

 <div class="xpanel" >
   <div class="xpanel-heading-sm">
      <span class="xpanel-title">
      <i class="fa fa-stethoscope"></i> TSH PKU Screening
      </span>
      <span class="pull-right">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', ['/nb/visit-screening/create','visit_id'=>$model->visit_id,'type'=>'tshpku'],[
          'class'=>'btn-modal btn btn-primary pull-right btn-sm ',
          'data'=>['type'=>'tshpku']
        ]);?>
    </span>
   </div>
   <div class="panel-body person-form" >
    <?php Pjax::begin(['id'=>'pjax-tsh-pku']); ?>
    <?= GridView::widget([
            'id'=>'grid-tsk-pku',
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
                        'type' => 'tshpku',
                        'id' => $model->id
                      ],['class'=>'btn-modal','data'=>['pjax'=>'0']]);
                  }
                ],
                'result',
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
