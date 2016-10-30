<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Refer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="refer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'refer_date')->textInput() ?>

    <?= $form->field($model, 'refer_to')->textInput() ?>

    <?= $form->field($model, 'irefer_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
