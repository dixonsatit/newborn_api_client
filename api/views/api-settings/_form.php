<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?= $model->key != 'driver' ? $form->field($model, "[$key]value")->textInput(['maxlength' => true])->label(ucfirst($model->key)) : null; ?>
    <?= $model->key == 'driver' ? $form->field($model,"[$key]value")->dropdownList($model->getDriverItems())->label(ucfirst($model->key)): null; ?>

</div>
