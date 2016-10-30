<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\widgets\MaskedInput;



/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = 'การจำหน่าย';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการตรวจ ('.$person->fullName.')', 'url' => ['visit/index','id'=>$person->newborn_id]];
$this->params['breadcrumbs'][] = $this->title;
// echo "string";
//
// \yii\helpers\Vardumper::dump($icd10,10,true);
?>

<?php $form = ActiveForm::begin(); ?>

<?=$this->render('/_menus',[
    'id'=>$person->newborn_id
])?>

<div class="xpanel-tab">
  <?= $this->render('/_visit-menus', [
      'visit' => $model,
      'person' => $person,
  ])?>
</div>

<div class="xpanel visit-index">
  <div class="xpanel-heading-sm">
      <span class="xpanel-title"> <i class="fa fa-ambulance"></i> สถานะการจำหน่าย </span>
  </div>
  <div class="panel-body visit-create">
    <div class="row">
      <div class="col-md-3">
          <?= $form->field($model, 'discharge_date')->widget(MaskedInput::className(), ['mask' => '99-99-9999']) ?>
      </div>

      <div class="col-md-3">
          <?= $form->field($model, 'discharge_status')->inline()->radioList($model->getItems('status_discharge')) ?>
      </div>
    </div>
  </div>
</div>

<div class="xpanel panel-refer">
  <div class="xpanel-heading-sm">
      <span class="xpanel-title"> <i class="fa fa-ambulance"></i> ส่ง Refer </span>
  </div>
  <div class="panel-body visit-create">
    <div class="row">
      <div class="col-md-4">
            <?= $form->field($model, 'refer_date')->widget(MaskedInput::className(), ['mask' => '99-99-9999']) ?>
      </div>
      <div class="col-md-8">
       <?= $form->field($model, 'refer_hospcode')->widget(Select2::className(),[
         'initValueText'=> $initReferHospital,
         'options' => ['placeholder' => 'เลือกสถานพยาบาล..'],
         'pluginOptions' => [
           'allowClear' => true,
           'language' => [
                    'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
           ],
           'ajax' => [
               'url' => Url::to(['/nb/api/hospital/find']),
               'dataType' => 'json',
               'cache'=>true,
               'data' => new JsExpression('function(params) { return {q:params.term,page:params.page}; }'),
               'processResults' => new JsExpression("function (data, params) {

                        var datas = $.map(data.items, function (obj) {
                         obj.id = obj.off_id;
                         obj.text =  ('('+obj.off_id+') '+obj.name);
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
           ]
         ]
       ]) ?>
      </div>
    </div>
  </div>
</div>
<br>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '<i class=""></i> บันทึก' : 'บันทึก', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') .' pull-right btn-lg']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php
$this->registerJs("

  setHideInput(3,$('input[name=\"Visit[discharge_status]\"]:checked').val(),'.panel-refer');

  $('input[name=\"Visit[discharge_status]\"]').click(function(val){
    setHideInput(3,$(this).val(),'.panel-refer');
  });


  function setHideInput(set,value,objTarget)
  {
    console.log(set+'='+value);
      if(set==value)
      {
        $(objTarget).show(500);
      }
      else
      {
        $(objTarget).hide(500);
      }
  }
");
 ?>
