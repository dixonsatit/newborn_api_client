<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'hid') ?>

    <?= $form->field($model, 'prename') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'lname') ?>

    <?php // echo $form->field($model, 'hn') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'birth') ?>

    <?php // echo $form->field($model, 'mstatus') ?>

    <?php // echo $form->field($model, 'occupation_old') ?>

    <?php // echo $form->field($model, 'occupation_new') ?>

    <?php // echo $form->field($model, 'race') ?>

    <?php // echo $form->field($model, 'nation') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'fstatus') ?>

    <?php // echo $form->field($model, 'father') ?>

    <?php // echo $form->field($model, 'mother') ?>

    <?php // echo $form->field($model, 'couple') ?>

    <?php // echo $form->field($model, 'vstatus') ?>

    <?php // echo $form->field($model, 'movein') ?>

    <?php // echo $form->field($model, 'discharge') ?>

    <?php // echo $form->field($model, 'ddischarge') ?>

    <?php // echo $form->field($model, 'abogroup') ?>

    <?php // echo $form->field($model, 'rhgroup') ?>

    <?php // echo $form->field($model, 'labor') ?>

    <?php // echo $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'typearea') ?>

    <?php // echo $form->field($model, 'd_update') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
