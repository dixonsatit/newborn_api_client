<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Access Token';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-3">
        <?= $this->render('@common/views/user/settings/_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>

            <div class="panel-body">
              <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'access_token')->textInput([
                    'readonly'=>'readonly',
                ]) ?>

                <?= Html::submitButton('Reset Token', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
