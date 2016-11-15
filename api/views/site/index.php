<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Newborn Api Client';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>API Client!</h1>
        <p><?=Html::a('<i class="glyphicon glyphicon-cog"></i> ตั้งค่า API',['api-settings/index'],[
            'class'=>'btn btn-default btn-lg'
        ]);?>

    </div>

</div>
