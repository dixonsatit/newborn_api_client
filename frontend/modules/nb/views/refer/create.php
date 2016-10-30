<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Refer */

$this->title = 'Create Refer';
$this->params['breadcrumbs'][] = ['label' => 'Refers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
