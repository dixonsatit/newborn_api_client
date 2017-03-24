<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Hospital;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = \yii\bootstrap\ActiveForm::begin([
                    'id' => 'profile-form',
                    //'options' => ['class' => 'form-horizontal'],
                    // 'fieldConfig' => [
                    //     'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                    //     'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    // ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                ]); ?>

                <div class="row">
                  <div class="col-md-2">
                      <?= $form->field($model, 'title') ?>
                  </div>
                  <div class="col-md-5">
                        <?= $form->field($model, 'fname') ?>
                  </div>
                  <div class="col-md-5">
                      <?= $form->field($model, 'lname') ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <?= $form->field($model, 'position') ?>
                  </div>
                  <div class="col-md-6">
                          <?php $form->field($model, 'position_level') ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <?= $form->field($model, 'tel') ?>
                  </div>
                  <div class="col-md-6">
                          <?= $form->field($model, 'mobile') ?>
                  </div>
                </div>

<?= $form->field($model, 'hcode')->widget(Select2::className(),[
                            'initValueText'=> $initHospital,
                            'options' => ['placeholder' => 'เลือกสถานพยาบาล..'],
                            'pluginOptions' => [
                                'minimumInputLength' => 3,
                                'allowClear' => true,
                                'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                ],
                                'ajax' => [
                                    'url' => Url::to(['/hospital/find']),
                                    'dataType' => 'json',
                                    
                                    'cache'=>true,
                                    'data' => new JsExpression('function(params) { return {q:params.term,page:params.page}; }'),
                                    'processResults' => new JsExpression("function (data, params) {

                                            var datas = $.map(data.items, function (obj) {
                                            obj.id = obj.off_id;
                                            obj.text =  ('('+obj.off_id+') '+obj.name);
                                            return obj;
                                            });

                                            params.page = params.page || 1;

                                            return {
                                                results: datas,
                                                pagination: {
                                                more: (params.page * data._meta.perPage) < data._meta.totalCount
                                                }
                                            };
                                            },
                                        ")
                                ]
                            ]
                            ]) ?>


                <div class="form-group">

                        <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>

                </div>

                <?php \yii\bootstrap\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
