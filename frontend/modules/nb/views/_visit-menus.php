<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
 ?>

 <div class="xpanel-heading">
   <?= Html::a('<i style="font-size:18px;" class="glyphicon glyphicon-chevron-left"></i> '.' ', ['visit/index','id'=>$person->newborn_id]) ?>
   <span class="xpanel-title"><?= Html::encode($this->title) ?> </span>
      <?php if(!$visit->isNewRecord): ?>
      <?= Nav::widget([
        'items' => [
            [
                'label' => 'ประวัติ',
                'url' => ['/nb/visit/update','id'=>$person->newborn_id,'visit_id'=>$visit->visit_id]
            ],
            [
                'label' => 'การคัดกรอง',
                'url' => ['/nb/visit/screening','id'=>$person->newborn_id,'visit_id'=>$visit->visit_id],
            ],
            [
                'label' => 'โรคและหัตถการ',
                'url' => ['/nb/visit/disease','id'=>$person->newborn_id,'visit_id'=>$visit->visit_id],
            ],
            [
                'label' => 'ข้อมูลพัฒนาการ',
                'url' => ['/nb/visit-develop/create','visit_id' => $visit->visit_id],
            ],
            [
                'label' => 'การจำหน่าย',
                'url' => ['/nb/visit/discharge','visit_id' => $visit->visit_id],
            ]
        ],
        'options' => ['class' =>'nav-pills pull-right','style'=>'margin-top:-10px;'], // set this to nav-tab to get tab-styled navigation
      ]);?>
    <?php endif; ?>
    <div>
   </div>
 </div>

 <?= $this->render('_info',[
   'visit' => $visit,
   'person' => $person
 ])?>
