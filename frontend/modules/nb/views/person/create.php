<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */

$this->title = 'ลงทะเบียนทารกแรกเกิด';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
