<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Visit */

$this->title = 'ลงทะเบียนตรวจ';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['/nb/person/index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการตรวจ ('.$person->fullName.')', 'url' => ['visit/index','id'=>$person->newborn_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if($person->isOwnHospital): ?>
    <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        ข้อมูล Hn, GA, Weight ถูกโหลดมาจากข้อมูลประวัติ.. หากไม่ต้องการสามารถลบออกได้!
    </div>
<?php endif; ?>

<?= $this->render('/_menus',[
    'id' => $person->newborn_id
])?>

<?= $this->render('_form', [
    'model' => $model,
    'person' => $person
]) ?>
