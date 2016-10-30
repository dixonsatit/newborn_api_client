<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
 ?>

 <div class="xpanel-heading">
   <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> '.' ', ['visit/index','id'=>$person->newborn_id]) ?>
   <span class="xpanel-title"><?= Html::encode($this->title) ?> </span>
      <?php if(!$model->isNewRecord): ?>
      <?= Nav::widget([
        'items' => [
            [
                'label' => 'ประวัติ',
                'url' => ['/nb/visit/update','id'=>$personId,'visit_id'=>$visitId]
            ],
            [
                'label' => 'การคัดกรอง',
                'url' => ['/nb/visit/screening','id'=>$personId,'visit_id'=>$visitId],
            ],
            [
                'label' => 'โรคและหัตถการ',
                'url' => ['/nb/visit/disease','id'=>$personId,'visit_id'=>$visitId],
            ],
            [
                'label' => 'ข้อมูลพัฒนาการ',
                'url' => ['/nb/visit-develop/create','visit_id'=>$visitId],
            ]
        ],
        'options' => ['class' =>'nav-pills pull-right','style'=>'margin-top:-10px;'], // set this to nav-tab to get tab-styled navigation
      ]);?>
    <?php endif; ?>
    <div>
   </div>
 </div>
 <?= $this->render('_info',[
     'model' => $model,
     'person' => $person
 ])?>
