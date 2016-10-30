<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\VisitScreening */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-screening-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hospcode')->textInput() ?>

    <?= $form->field($model, 'patient_visit')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'tshpku' => 'Tshpku', 'oae' => 'Oae', 'ivh' => 'Ivh', 'untrasound' => 'Untrasound', 'rop' => 'Rop', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'check_date')->textInput() ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
