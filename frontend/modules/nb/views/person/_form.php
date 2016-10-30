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

<div class="<?=$model->isNewRecord ? 'xpanel' : 'xpanel-tab' ?>" id="personal-data">

  <div class="xpanel-heading-sm">
      <span class="xpanel-title">
        ข้อมูลทารกแรกเกิด
      </span>
      <span class="pull-right"><?= $submit = Html::submitButton('บันทึก', ['style'=>'min-width:150px;', 'class' => 'btn btn-primary']) ?></span>
  </div>

  <div class="panel-body person-form" >

    <div class="row">
      <div class="col-sm-2">
        <?= $form->field($model, 'register_date')->widget(MaskedInput::className(), ['mask' => '99-99-9999']) ?>
      </div>
      <div class="col-sm-2 ">
        <?= $form->field($model, 'prename')->widget(Typeahead::classname(), [
            'dataset' => [
                [
                    'local' => ['ด.ช.','ด.ญ.']
                ]
            ],
            'pluginOptions' => ['highlight' => true],
            'options' => ['placeholder' => 'เลือกคำนำหน้า...'],
        ]); ?>
      </div>
      <div class="col-sm-4 col-xs-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-4 col-xs-6">
        <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <?= $form->field($model, 'cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
      </div>
      <div class="col-sm-3">
        <?= $form->field($model, 'birth')->widget(MaskedInput::className(), ['mask' => '99-99-9999'])->label($model->isNewRecord ? $model->getAttributeLabel('birth') : $model->getAttributeLabel('birth'). ': '.$model->getCurrentAge('birth').' ปี') ?>
      </div>
      <div class="col-sm-3">
        <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-3">
          <?= $form->field($model, 'sex')->inline()->radioList($model->getItems('sex')); ?>
      </div>
    </div>
  </div>
  </div>

  <?=$this->render('_form_address',[
    'form' => $form,
    'model' => $model
  ]); ?>

  <div class="xpanel" id="parent-data">

    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ข้อมูลบิดา-มารดา
        </span>
    </div>

    <div class="panel-body person-form">
      <div class="row">
        <div class="col-sm-6">
          <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
          <?= $form->field($model, 'mother')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
          <?= $form->field($model, 'father')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
        </div>
      </div>




  </div>
  </div>
  <div class="form-group pull-right">
      <?= $submit; ?>
  </div>

<?php ActiveForm::end(); ?>
