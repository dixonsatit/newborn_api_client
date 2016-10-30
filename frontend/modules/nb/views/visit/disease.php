<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use kartik\widgets\TimePicker;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = 'โรคและหัตถการ';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการตรวจ ('.$person->fullName.')', 'url' => ['visit/index','id'=>$person->newborn_id]];
$this->params['breadcrumbs'][] = $this->title;
$pluginOptions = [
            'language' => [
                     'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => Url::to(['/nb/api/icdcodes/icdten']),
                'dataType' => 'json',
                'cache'=>true,
                //'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                'templateSelection' => new JsExpression('function (data) { return data.code; }'),
                'data' => new JsExpression('function(params) { return {q:params.term,page:params.page}; }'),
                'processResults' => new JsExpression("function (data, params) {

                         var datas = $.map(data.items, function (obj) {
                          obj.id = obj.code;
                          obj.text =  ('('+obj.code+') '+obj.description);
                          return obj;
                         });

                         params.page = params.page || 1;

                         return {
                           results: datas,
                           pagination: {
                             more: (params.page * data._meta.perPage) < data._meta.totalCount
                           }
                         };
                       },
                   ")
            ],
            'tags' => true,
            //'maximumInputLength' => 10
        ];

$pluginOptionsIcdten = $pluginOptions;
$pluginOptionsIcdten['ajax']['url'] = Url::to(['/nb/api/icdcodes/icdten']);

$pluginOptionsIcdnine = $pluginOptions;
$pluginOptionsIcdnine['ajax']['url'] = Url::to(['/nb/api/icdcodes/icdnine']);
?>

<?php $form = ActiveForm::begin(); ?>

<?=$this->render('/_menus',[
    'id'=>$id
])?>

<div class="xpanel-tab">
  <?= $this->render('/_visit-menus', [
      'visit' => $model,
      'person' => $person,
  ])?>
<div class="xpanel-body patient-visit-create">
    <div class="row">
      <div class="col-md-6">

        <?= $form->field($model, 'disease')->widget(Select2::className(),[
          'data'=> $initDisease,
          'maintainOrder' => true,
          'toggleAllSettings' => [
              'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
              'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
              'selectOptions' => ['class' => 'text-success'],
              'unselectOptions' => ['class' => 'text-danger'],
          ],
          'options' => ['placeholder' => 'กรอก disease..', 'multiple' => true],
          'pluginOptions' => $pluginOptionsIcdten
        ]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'complication')->widget(Select2::className(),[
          'data'=>$initComplication,
          'maintainOrder' => true,
          'toggleAllSettings' => [
              'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
              'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
              'selectOptions' => ['class' => 'text-success'],
              'unselectOptions' => ['class' => 'text-danger'],
          ],
          'options' => ['placeholder' => 'กรอก complication..', 'multiple' => true],
          'pluginOptions' => $pluginOptionsIcdten
        ]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'procedure_code')->widget(Select2::className(),[
          'data'=>$initProcedureCode,
          'maintainOrder' => true,
          'toggleAllSettings' => [
              'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
              'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
              'selectOptions' => ['class' => 'text-success'],
              'unselectOptions' => ['class' => 'text-danger'],
          ],
          'options' => ['placeholder' => 'กรอก Procedure..', 'multiple' => true],
          'pluginOptions' => $pluginOptionsIcdnine
        ]) ?>
      </div>
    </div>

</div>
</div>
<br>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '<i class=""></i> บันทึก' : 'บันทึก', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') .' pull-right']) ?>
</div>
<?php ActiveForm::end(); ?>
