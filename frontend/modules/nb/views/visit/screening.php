<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use kartik\select2\Select2;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = 'การคัดกรอง';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการตรวจ ('.$person->fullName.')', 'url' => ['visit/index','id'=>$person->newborn_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=$this->render('/_menus',[
    'id'=>$id
])?>

<div class="xpanel-tab">
  <?= $this->render('/_visit-menus', [
      'visit' => $model,
      'person' => $person,
  ])?>
</div>

<!-- =============== TSK PKU Screening=========================== -->
<?php if(!$model->isNewRecord): ?>
<?= $this->render('_grid_tsk_pku',[
  'model'   => $model,
  'patient' => $person,
  'id'      => $id,
  'searchModel' => $tskSearchModel,
  'dataProvider' => $tskDataprovider
]); ?>
<?php endif; ?>
<!-- =============== END TSK PKU Screening======================= -->

<!-- =============== OAE Screening=========================== -->
<?php if(!$model->isNewRecord): ?>
<?= $this->render('_grid_oae',[
  'model'   => $model,
  'patient' => $person,
  'id'      => $id,
  'searchModel' => $oaeSearchModel,
  'dataProvider' => $oaeDataprovider
]); ?>
<?php endif; ?>
<!-- =============== END OAE Screening======================= -->

<!-- =============== IVH Screening=========================== -->
<?php if(!$model->isNewRecord): ?>
<?= $this->render('_grid_ivh',[
  'model'   => $model,
  'patient' =>  $person,
  'id'      => $id,
  'searchModel' => $ivhSearchModel,
  'dataProvider' => $ivhDataprovider
]); ?>
<?php endif; ?>
<!-- =============== END IVH Screening======================= -->

<!-- =============== ROP Screening=========================== -->
<?php if(!$model->isNewRecord): ?>
<?= $this->render('_grid_rop',[
  'model'   => $model,
  'patient' =>  $person,
  'id'      => $id,
  'searchModel' => $ropSearchModel,
  'dataProvider' => $ropDataprovider
]); ?>
<?php endif; ?>
<!-- =============== END ROP Screening======================= -->


<?php
$Js = <<<JS

$(document).on('click', '.btn-modal', function(event){
  event.preventDefault();
  jQuery('#modal-screeen').find('.modal-content').html("");
  if ($('#modal-screeen').isShown)
  {
    jQuery('#modal-screeen').find('.modal-content').load($(this).attr('href'),function(){

    });
  }
  else
  {
    jQuery('#modal-screeen').modal('show').find('.modal-content').load($(this).attr('href'),function(){

    });
  }

});
JS;
$this->registerJs($Js);
 ?>

<?php
$script = <<<JS
  $.pjax.defaults.timeout = 4000;

    $('body').on('beforeSubmit', 'form#tshpku-form', function() {
      var form = $(this);
      if (form.find('.has-error').length) {
        return false;
      }
      $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        success: function(errors) {
          console.log(form.data('type'));
            $('#modal-screeen').modal('hide');
            $.pjax.reload({container:'#pjax-tsh-pku'});
        }
      });
      return false;
    });
    $('body').on('beforeSubmit', 'form#ivh-form', function() {
      var form = $(this);
      if (form.find('.has-error').length) {
        return false;
      }
      $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        success: function(errors) {
          console.log(form.data('type'));
            $('#modal-screeen').modal('hide');
            $.pjax.reload({container:'#pjax-ivh'});
        }
      });
      return false;
    });
    $('body').on('beforeSubmit', 'form#oae-form', function() {
      var form = $(this);
      if (form.find('.has-error').length) {
        return false;
      }
      $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        success: function(errors) {
          console.log(form.data('type'));
            $('#modal-screeen').modal('hide');
            $.pjax.reload({container:'#pjax-oae'});
        }
      });
      return false;
    });
    $('body').on('beforeSubmit', 'form#rop-form', function() {
      var form = $(this);
      if (form.find('.has-error').length) {
        return false;
      }
      $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        success: function(errors) {
          console.log(form.data('type'));
            $('#modal-screeen').modal('hide');
            $.pjax.reload({container:'#pjax-rop'});
        }
      });
      return false;
    });
JS;
$this->registerJs($script);
?>


<?php Modal::begin([
    'header' => 'Loading...',
    'id'=>'modal-screeen'
]);

Modal::end();
?>
