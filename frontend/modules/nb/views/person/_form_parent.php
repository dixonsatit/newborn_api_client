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
        รายละเอียดมารดา
      </span>
      <span class="pull-right"><?= $submit = Html::submitButton('บันทึก', ['style'=>'min-width:150px;', 'class' => 'btn btn-primary']) ?></span>
  </div>

  <div class="panel-body person-form" >

    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-3">
        <?= $form->field($model, 'mother')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'mother_hn')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'mother_an')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-2">
        <?= $form->field($model, 'mother_age')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

  </div>
  </div>

  <div class="xpanel">
    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ประวัติก่อนคลอด
        </span>
    </div>

    <div class="panel-body person-form">
      <div class="row">
         <div class="col-md-3">
           <?= $form->field($model, 'mother_vdrl')->inline()->radioList($model->getItems('positive/negative')) ?>
         </div>
         <div class="col-md-3">
         <?= $form->field($model, 'mother_hbsag')->inline()->radioList($model->getItems('positive/negative')) ?>
         </div>
         <div class="col-md-3">
           <?= $form->field($model, 'mother_bloody_show')->inline()->radioList($model->getItems('yes/no')) ?>
         </div>
         <div class="col-md-3">
           <?= $form->field($model, 'mother_fever')->inline()->radioList($model->getItems('yes/no')) ?>
         </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <?= $form->field($model, 'mother_amniotic_fluid_type')->inline()->radioList($model->getItems('amniotic_fluid_type')) ?>
        </div>
        <div class="col-md-2">
         <?= $form->field($model, 'mother_water_break')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-2">
         <?= $form->field($model, 'mother_day_of_water_break')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-1">
              <?= $form->field($model, 'mother_g')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'mother_p')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
          <?= $form->field($model, 'mother_no_of_anc')->textInput(['maxlength' => true]) ?>
        </div>

      </div>
    </div>
  </div>

  <div class="xpanel">
    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          โรคประจำตัว
        </span>
    </div>
    <div class="panel-body person-form">
      <div class="row">
        <div class="col-md-2">
          <?= $form->field($model, 'mother_congenital_disease')->inline()->radioList($model->getItems('have/nohave')) ?>
        </div>
        <div class="col-md-5">
         <?= $form->field($model, 'mother_congenital_disease_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">
         <?= $form->field($model, 'mother_drug')->textInput(['maxlength' => true]) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="xpanel">
    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ยาที่ได้รับ
        </span>
    </div>
    <div class="panel-body person-form">

           <div class="row">
             <div class="col-md-2">
              <?= $form->field($model, 'mother_drug_before_born')->inline()->radioList($model->getItems('yes/no')) ?>
             </div>
             <div class="col-md-4">
              <?= $form->field($model, 'mother_drug_before_born_item')->inline()->radioList($model->getItems('mother_drug_before_born_item')) ?>
             </div>
             <div class="col-md-2">
              <?= $form->field($model, 'mother_drug_before_born_amount')->textInput(['maxlength' => true]) ?>
             </div>
             <div class="col-md-4">
              <?= $form->field($model, 'mother_drug_name_before_born')->textInput(['maxlength' => true]) ?>
             </div>
           </div>
      <div class="row">
        <div class="col-md-2">
          <?= $form->field($model, 'mother_antibiotic')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-8">
          <?= $form->field($model, 'mother_antibiotic_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
          <?= $form->field($model, 'mother_day_of_antibiotic')->textInput(['maxlength' => true]) ?>
        </div>
      </div>
    </div>
  </div>


  <div class="xpanel">
    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ปัญหาอื่นๆ ระบุ
        </span>
    </div>
    <div class="panel-body person-form">

           <div class="row">
             <div class="col-md-2">
               <?= $form->field($model, 'mother_problem')->inline()->radioList($model->getItems('yes/no')) ?>
             </div>
             <div class="col-md-10">
              <?= $form->field($model, 'mother_problem_desc')->textInput(['maxlength' => true]) ?>
             </div>
           </div>
    </div>
  </div>


  <div class="form-group pull-right" style="padding-right:10px;">
        <?= $submit ?>
  </div>

<?php ActiveForm::end(); ?>
