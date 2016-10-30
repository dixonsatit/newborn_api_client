<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\VisitDevelop */

$this->title = 'ข้อมูลพัฒนาการ';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการตรวจ ('.$person->fullName.')', 'url' => ['visit/index','id'=>$person->newborn_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_menus',[
    'id' => $person->newborn_id
])?>

<?= $this->render('_form', [
    'visit'=> $visit,
    'person'=> $person,
    'models' => $models
]) ?>
