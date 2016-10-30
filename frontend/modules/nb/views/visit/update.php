<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Visit */

$this->title = 'แก้ไขทะเบียนตรวจ';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['/nb/person/index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการตรวจ ('.$person->fullName.')', 'url' => ['visit/index','id'=>$person->newborn_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/_menus',[
    'id' => $person->newborn_id
])?>

<?= $this->render('_form', [
    'model' => $model,
    'person' =>$person
]) ?>
