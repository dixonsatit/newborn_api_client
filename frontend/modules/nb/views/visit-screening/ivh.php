<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\VisitScreening */

$this->title = 'IVH Screening';
$this->params['breadcrumbs'][] = ['label' => 'Visit Screenings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
  'id' => 'ivh-form',
  'options'=>['data'=>['type'=>'ivh']]
]); ?>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= Html::encode($this->title) ?></h4>
</div>
<div class="modal-body">

 <div class="container-items">

    <?php foreach ($models as $i => $model): ?>
      <div class="item">

        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, "[{$i}]check_date")->widget(MaskedInput::className(), ['mask' => '99-99-9999 99:99']) ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, "[{$i}]ivh_grade")->dropDownList($model->getItems('ivh_grade')) ?>
          </div>

        </div>
         <?= $form->field($model, "[{$i}]ivh")->textArea() ?>
      </div>

    <?php endforeach; ?>
 </div>
</div>
<div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึกแก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

  <?php ActiveForm::end(); ?>
