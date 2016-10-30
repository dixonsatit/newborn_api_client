<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use frontend\modules\nb\models\Changwat;


/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */
/* @var $form yii\bootstrap\ActiveForm */

?>
<div class="xpanel" id="parent-data">

  <div class="xpanel-heading-sm">
      <span class="xpanel-title">
        ข้อมูลที่อยู่ปัจจุบัน
      </span>
  </div>

  <div class="panel-body person-form">
    <div class="row">
      <div class="col-sm-2">
        <?= $form->field($model, 'add_houseno')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-2">
        <?= $form->field($model, 'add_village')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'add_road')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="col-sm-4">
        <?= $form->field($model, 'add_soimain')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'add_changwat')->widget(Select2::classname(), [
              'data' => Changwat::find()->select(['abbr'])->indexBy('left(code,2)')->orderBy('abbr ASC')->column(),
              'options' => ['id'=>'dd-changwat','placeholder' => 'เลือกจังหวัด ...'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
          ]); ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'add_ampur')->widget(DepDrop::classname(), [
               'options' => ['id'=>'dd-ampur'],
               'type'=>DepDrop::TYPE_SELECT2,
               'data' => $model->isNewRecord ? [] : $model->loadInitAddress($model->add_changwat,'ampur'),
               'pluginOptions'=>[
                   'depends'=>['dd-changwat'],
                   'placeholder' => 'เลือกอำเภอ...',
                   'url' => Url::to(['/nb/person/get-ampur'])
               ]
           ]) ?>
        </div>
        <div class="col-sm-4">
          <?= $form->field($model, 'add_tambon')->widget(DepDrop::classname(), [
             'options' => ['id'=>'dd-tambon'],
             'type'=>DepDrop::TYPE_SELECT2,
             'data' => $model->isNewRecord ? [] : $model->loadInitAddress($model->add_changwat.$model->add_ampur,'tambon'),
             'pluginOptions'=>[
                 'depends'=>['dd-changwat','dd-ampur'],
                 'placeholder' => 'เลือกตำบล...',
                 'url' => Url::to(['/nb/person/get-tambon'])
             ]
         ]) ?>
        </div>

    </div>

    <div class="row">
      <div class="col-sm-3">
          <?= $form->field($model, 'add_zip')->widget(MaskedInput::className(), ['mask' => '99999']) ?>
      </div>
      <div class="col-sm-3">
        <?= $form->field($model, 'add_mobile')->widget(MaskedInput::className(), ['mask' => '99-9999-9999']) ?>
      </div>
    </div>

  </div>
</div>
