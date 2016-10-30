<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$groupName = null;
$totalItem = count($models);
/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\VisitDevelop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xpanel-tab visit-index">
  <?= $this->render('/_visit-menus', [
      'visit' => $visit,
      'person' => $person,
  ])?>
</div>

<div class="visit-develop-form">
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->errorSummary($models) ?>

    <?php
    foreach ($models as $index => $model):
      $isShowHeader = $groupName != $model->groupName;
    ?>

      <?php if ($isShowHeader): ?>
        <?php if ($groupName != null) echo  '</div></div>'; ?>
        <div class="xpanel">
          <div class="xpanel-heading-sm">
            <span class="xpanel-title">
             <?= $model->groupName?>
            </span>
          </div>
          <div class="panel-body" >
      <?php endif; ?>
          <?= $form->field($model, "[$index]id")->hiddenInput()->label(false);?>
          <?= $form->field($model, "[$index]develop_no")->checkbox([
              'label' => $model->labelName,
              'value' => $model->itemCode,
              'labelOptions' => [
                  'class' => 'col-md-4',
                  'style' => 'font-weight:normal',
              ],
            ])->label(false);
          ?>

        <?php
          if ($isShowHeader) {
              $groupName = $model->groupName;
          }
        ?>
    <?php
    endforeach;
    if ($groupName!= null) {
        echo '</div></div>';
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary').' pull-right']) ?>
    </div>
  <?php ActiveForm::end(); ?>
</div>
