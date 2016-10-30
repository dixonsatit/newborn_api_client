<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */

$this->title = 'ข้อมูลการคลอด ('.$model->fullName.')';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="person-update">

    <!-- <h4><?= Html::encode($this->title) ?></h4> -->
    <?= $this->render('/_menus',[
      'id' => $model->newborn_id
    ])?>
    <?= $this->render('_form_newborn_baby', [
        'model' => $model,
    ]) ?>

</div>
