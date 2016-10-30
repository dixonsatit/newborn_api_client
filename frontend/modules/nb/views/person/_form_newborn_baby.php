<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */
/* @var $form yii\widgets\ActiveForm */

?>
<?php $form = ActiveForm::begin([
  'id'=>'person-form'
]); ?>

<div class="xpanel-tab" id="personal-data">

  <div class="xpanel-heading-sm">
      <span class="xpanel-title">
        รายละเอียด Admit
      </span>
      <span class="pull-right"><?= $submit = Html::submitButton('บันทึก', ['style'=>'min-width:150px;', 'class' => 'btn btn-primary']) ?></span>
  </div>

  <div class="panel-body person-form" >

    <div class="row">
      <div class="col-sm-5">
          <?= $form->field($model, 'newborn_at')->inline()->radioList($model->getItems('newborn_at')); ?>
      </div>
      <div class="col-sm-7">
        <?= $form->field($model, 'newborn_refer_from')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <?= $form->field($model, 'admit_datetime')->widget(MaskedInput::className(), ['mask' => '99-99-9999 99:99:00']) ?>
      </div>
      <div class="col-sm-6">
        <?= $form->field($model, 'admit_wardname')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-3">
        <?= $form->field($model, 'admit_age')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

  </div>
  </div>

  <div class="xpanel">
    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          รายละเอียดการคลอด
        </span>
    </div>

    <div class="panel-body person-form">
      <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'ga')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'birth_weight')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'apgar')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'lr_type')->dropDownList($model->getItems('lr_type')) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="xpanel">
    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ข้อมูลการช่วยชีวิต
        </span>
    </div>

    <div class="panel-body person-form">
      <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'is_resuscitate')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'date_of_resuscitate')->widget(MaskedInput::className(), ['mask' => '99-99-9999 99:99:00']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ppv')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'cpr')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-2">
          <?= $form->field($model, 'uvc')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
          <?= $form->field($model, 'et_tube')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-3">
          <?= $form->field($model, 'position_ettube')->inline()->radioList($model->getItems('position_et_tube')) ?>
        </div>

        <div class="col-md-3">
          <?= $form->field($model, 'day_on_ettube')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
          <?= $form->field($model, 'o2')->textInput(['maxlength' => true]) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="xpanel">
    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ข้อมูลการจำหน่าย
        </span>
    </div>

    <div class="panel-body person-form">
      <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'discharge_status')->inline()->radioList($model->getItems('status_discharge')) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'discharge_date')->widget(MaskedInput::className(), ['mask' => '99-99-9999']) ?>
        </div>
        <div class="col-md-2">
          <?= $form->field($model, 'discharge_age')->textInput(['maxlength' => true]) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group pull-right" style="padding-right:10px;">
        <?= $submit ?>
  </div>

<?php ActiveForm::end(); ?>
