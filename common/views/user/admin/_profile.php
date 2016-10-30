<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View 					$this
 * @var dektrium\user\models\User 		$user
 * @var dektrium\user\models\Profile 	$profile
 */

?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
  //  'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    // 'fieldConfig' => [
    //     'horizontalCssClasses' => [
    //         'wrapper' => 'col-sm-9',
    //     ],
    // ],
]); ?>

<div class="row">
  <div class="col-md-6">
    <?= $form->field($profile, 'province_code') ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($profile, 'hcode') ?>
  </div>
</div>

<div class="row">
  <div class="col-md-2">
    <?= $form->field($profile, 'title') ?>
  </div>
  <div class="col-md-5">
    <?= $form->field($profile, 'fname') ?>
  </div>
  <div class="col-md-5">
    <?= $form->field($profile, 'lname') ?>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <?= $form->field($profile, 'position') ?>
  </div>
  <div class="col-md-4">
    <?= $form->field($profile, 'position_level') ?>
  </div>
  <div class="col-md-4">
    <?= $form->field($profile, 'position_type') ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <?= $form->field($profile, 'tel') ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($profile, 'mobile') ?>
  </div>
</div>

<?php //$form->field($profile, 'name') ?>
<?php //$form->field($profile, 'public_email') ?>
<?php //$form->field($profile, 'website') ?>
<?php //$form->field($profile, 'location') ?>
<?php //$form->field($profile, 'gravatar_email') ?>
<?php //$form->field($profile, 'bio')->textarea() ?>


<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
