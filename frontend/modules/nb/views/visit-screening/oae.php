<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\VisitScreening */

$this->title = 'OAE Screening';
$this->params['breadcrumbs'][] = ['label' => 'Visit Screenings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
  'id' => 'oae-form',
  'options'=>['data'=>['type'=>'oae']]
]); ?>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= Html::encode($this->title) ?></h4>
</div>
<div class="modal-body">

 <div class="container-items">

    <?php foreach ($models as $i => $model): ?>
      <div class="item">
        <div class="row">
          <div class="col-md-4">
            <?= $form->field($model, "[{$i}]check_date")->widget(MaskedInput::className(), ['mask' => '99-99-9999 99:99']) ?>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-6">
            <?php // $form->field($model, "[{$i}]oae_left")->textInput(['maxlength' => true]) ?>
          </div>
          <div class="col-md-6">
            <?php // $form->field($model, "[{$i}]oae_right")->textInput(['maxlength' => true]) ?>
          </div>
        </div> -->
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, "[{$i}]oae_left_status")->inline()->radioList($model->getItems('success/failed')) ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, "[{$i}]oae_right_status")->inline()->radioList($model->getItems('success/failed')) ?>
          </div>
        </div>

      </div>

    <?php endforeach; ?>
 </div>
</div>
<div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึกแก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

  <?php ActiveForm::end(); ?>
