<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'hospcode' => $model->hospcode, 'pid' => $model->pid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'hospcode' => $model->hospcode, 'pid' => $model->pid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'hospcode',
            'cid',
            'pid',
            'hid',
            'prename',
            'name',
            'lname',
            'hn',
            'sex',
            'birth',
            'mstatus',
            'occupation_old',
            'occupation_new',
            'race',
            'nation',
            'religion',
            'education',
            'fstatus',
            'father',
            'mother',
            'couple',
            'vstatus',
            'movein',
            'discharge',
            'ddischarge',
            'abogroup',
            'rhgroup',
            'labor',
            'passport',
            'typearea',
            'd_update'
        ],
    ]) ?>

</div>
