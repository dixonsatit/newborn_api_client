<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Visit */

$this->title = $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => 'Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->visit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->visit_id], [
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
            'visit_id',
            'seq',
            'patient_id',
            'hospcode',
            'hn',
            'date',
            'clinic',
            'pttype',
            'age',
            'age_type',
            'result',
            'referin',
            'referout',
            'head_size',
            'height',
            'weight',
            'waist',
            'bp_max',
            'bp_min',
            'inp_id',
            'tsh_pku',
            'tsh_pku_date',
            'tsh_pku_time',
            'tsh_pku_result:ntext',
            'oae',
            'oae_date',
            'oae_abr',
            'oae_right',
            'oae_left',
            'oae_result',
            'ivh_ult_brain',
            'ivh_date',
            'ivh_result:ntext',
            'rop',
            'rop_date',
            'rop_result',
            'rop_hosp_appointment',
            'lastupdate',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
            'ga',
            'hc',
            'length',
            'af',
            'x',
            'foster_name',
            'milk',
            'milk_milk_powder',
            'milk_powder',
            'vaccine:ntext',
            'vaccine_other',
            'disease:ntext',
            'complication:ntext',
            'procedure_code:ntext',
            'summary:ntext',
        ],
    ]) ?>

</div>
