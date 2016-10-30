<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Refer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Refers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xpanel">

  <div class="xpanel-heading">
      <span class="xpanel-title">
        <i class="glyphicon glyphicon-import"></i> <?= Html::encode($this->title) ?>
      </span>
      
  </div>

  <div class="panel-body refer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hospcode',
            'patient_id',
            'visit_id',
            'refer_to',
            'status',
            'irefer_id',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'refer_hospital_name',
        ],
    ]) ?>

</div>
  </div>
