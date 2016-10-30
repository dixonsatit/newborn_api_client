<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Refer */

$this->title = 'รายละเอียดการรับ Refer ผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนส่งต่อผู้ป่วย (Refer Out)', 'url' => ['out']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xpanel">

  <div class="xpanel-heading">
      <span class="xpanel-title">
        <i class="glyphicon glyphicon-import"></i> <?= Html::encode($this->title) ?>
      </span>
      
  </div>

  <div class="panel-body refer-view">
    <?= DetailView::widget([
        'options'=>['class'=>'table table-striped'],
        'model' => $model,
        'attributes' => [
            'hospitalName',
            'personFullname',
            'statusLabel',
            'refer_date:Date',
            'created_at:date',
            'userFullname'
        ],
    ]) ?>

</div>
  </div>
