<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">
    <?php
     if($model->key == 'driver'){
         echo $form->field($model,"[$key]value")->dropdownList($model->getDriverItems())->label(ucfirst($model->key));
     }elseif($model->key == 'api_type'){
         echo $form->field($model,"[$key]value")->dropdownList($model->getApiTypeItems())->label(ucfirst($model->key));
     }elseif($model->key == 'version'){
         echo $form->field($model,"[$key]value")->dropdownList($model->getVersionTypeItems())->label(ucfirst($model->key));
     }else{
         echo $form->field($model, "[$key]value")->textInput(['maxlength' => true])->label(ucfirst($model->key));
     }
    ?>

</div>
