<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\VisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'visit_id') ?>

    <?= $form->field($model, 'seq') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'hn') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'clinic') ?>

    <?php // echo $form->field($model, 'pttype') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'age_type') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'referin') ?>

    <?php // echo $form->field($model, 'referout') ?>

    <?php // echo $form->field($model, 'head_size') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'waist') ?>

    <?php // echo $form->field($model, 'bp_max') ?>

    <?php // echo $form->field($model, 'bp_min') ?>

    <?php // echo $form->field($model, 'inp_id') ?>

    <?php // echo $form->field($model, 'tsh_pku') ?>

    <?php // echo $form->field($model, 'tsh_pku_date') ?>

    <?php // echo $form->field($model, 'tsh_pku_time') ?>

    <?php // echo $form->field($model, 'tsh_pku_result') ?>

    <?php // echo $form->field($model, 'oae') ?>

    <?php // echo $form->field($model, 'oae_date') ?>

    <?php // echo $form->field($model, 'oae_abr') ?>

    <?php // echo $form->field($model, 'oae_right') ?>

    <?php // echo $form->field($model, 'oae_left') ?>

    <?php // echo $form->field($model, 'oae_result') ?>

    <?php // echo $form->field($model, 'ivh_ult_brain') ?>

    <?php // echo $form->field($model, 'ivh_date') ?>

    <?php // echo $form->field($model, 'ivh_result') ?>

    <?php // echo $form->field($model, 'rop') ?>

    <?php // echo $form->field($model, 'rop_date') ?>

    <?php // echo $form->field($model, 'rop_result') ?>

    <?php // echo $form->field($model, 'rop_hosp_appointment') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'ga') ?>

    <?php // echo $form->field($model, 'hc') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'af') ?>

    <?php // echo $form->field($model, 'x') ?>

    <?php // echo $form->field($model, 'foster_name') ?>

    <?php // echo $form->field($model, 'milk') ?>

    <?php // echo $form->field($model, 'milk_milk_powder') ?>

    <?php // echo $form->field($model, 'milk_powder') ?>

    <?php // echo $form->field($model, 'vaccine') ?>

    <?php // echo $form->field($model, 'vaccine_other') ?>

    <?php // echo $form->field($model, 'disease') ?>

    <?php // echo $form->field($model, 'complication') ?>

    <?php // echo $form->field($model, 'procedure_code') ?>

    <?php // echo $form->field($model, 'summary') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
