<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\bootstrap\Modal;
use common\models\Hospital;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model) ?>

<div class="xpanel-tab visit-index">
  <?= $this->render('/_visit-menus', [
      'visit' => $model,
      'person' => $person,
      ]); 
  ?>
</div>

<div class="xpanel visit-index">
  <div class="xpanel-heading-sm">
      <span class="xpanel-title"> <i class="fa fa-user-md"></i> ซักประวัติ </span>
  </div>
  <div class="panel-body visit-create">
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'hn')->textInput(['maxlength' => true]); ?>
        </div>

        <div class="col-md-3">
          <?= $form->field($model, 'date')->widget(MaskedInput::className(), ['mask' => '99-99-9999']) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'foster_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
  </div>
</div>


<div class="xpanel visit-index">
  <div class="xpanel-heading-sm">
      <span class="xpanel-title"> <i class="fa fa-user-md"></i> ซักประวัติ </span>
  </div>
  <div class="panel-body visit-create">
    <div class="patient-visit-form">

      <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'ga')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'hc')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'af')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'x',[
              'template' => '{label} <div class="input-group">
                <div class="input-group-addon">x</div>
                {input}
                {error} {hint}
              </div>'
            ])->textInput(['maxlength' => true])->label('&nbsp;') ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'milk')->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'milk_milk_powder')->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'milk_powder')->radioList($model->getItems('yes/no')) ?>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="xpanel visit-index">
  <div class="xpanel-heading-sm">
      <span class="xpanel-title"> <i class="fa fa-medkit"></i> การให้วัคซีน </span>
  </div>
  <div class="panel-body visit-create">
    <div class="patient-visit-form">
      <div class="row">
        <div class="col-md-6">
          <?= $form->field($model, 'vaccine')->widget(Select2::className(),[
            'data' => $model->getItems('vaccine'),
            'maintainOrder' => true,
            'toggleAllSettings' => [
                'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
                'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
                'selectOptions' => ['class' => 'text-success'],
                'unselectOptions' => ['class' => 'text-danger'],
            ],
            'options' => ['placeholder' => 'เลือกวัคซีน..', 'multiple' => true],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 10
            ],
          ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'vaccine_other')->textInput(['maxlength' => true]) ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="xpanel visit-index">
  <div class="xpanel-heading-sm">
      <span class="xpanel-title"> <i class="glyphicon glyphicon-edit"></i> สรุปผลตรวจ </span>
  </div>
  <div class="panel-body visit-create">
    <div class="patient-visit-form">
      <?= $form->field($model, 'summary')->textarea(['rows' => 5]) ?>
    </div>
  </div>
</div>

<div class="form-group">
    <?php if($model->isOwnHospital): ?>
    <?= Html::submitButton($model->isNewRecord ? '<i class=""></i> บันทึก' : 'บันทึก', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'). ' pull-right']) ?>
  <?php endif; ?>
</div>


<?php ActiveForm::end(); ?>
