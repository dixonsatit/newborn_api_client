<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\nb\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนทารกแรกเกิด';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="xpanel">

  <div class="xpanel-heading">
      <span class="xpanel-title">
        <i class="fa fa-child"></i> <?= Html::encode($this->title) ?>
      </span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.' ลงทะเบียน', ['create'], ['class' => 'btn btn-success pull-right']) ?>
  </div>

  <div class="panel-body person-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'tableOptions' => ['class'=>'table table-striped table-hover'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                  'attribute'=>'fullName',
                  'format' => 'raw',
                  'value' => function($model){
                    return Html::a($model->fullName,['update','id'=>$model->newborn_id],['data'=>['pjax'=>'0']]);
                  }
                ],
                [
                  'attribute' => 'cid',
                  'options'=>['style'=>'width:150px;']
                ],
                [
                  'attribute' => 'pid',
                  'options'=>['style'=>'width:120px;']
                ],

                [
                  'attribute' => 'hospitalName',
                  'options'=>['style'=>'width:200px;']
                ],
                // 'hid',
                // 'prename',
                // 'name',
                // 'lname',
                // 'hn',
                // 'sex',
                // 'birth',
                // 'mstatus',
                // 'occupation_old',
                // 'occupation_new',
                // 'race',
                // 'nation',
                // 'religion',
                // 'education',
                // 'fstatus',
                // 'father',
                // 'mother',
                // 'couple',
                // 'vstatus',
                // 'movein',
                // 'discharge',
                // 'ddischarge',
                // 'abogroup',
                // 'rhgroup',
                // 'labor',
                // 'passport',
                // 'typearea',
                // 'd_update',
                // 'id',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
    </div>
</div>
