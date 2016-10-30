<?php
use yii\bootstrap\Nav;

$regisActive = (Yii::$app->controller->getRoute() == 'newborn7/patient/update' || Yii::$app->controller->getRoute() == 'newborn7/patient/create') ? true : false;
$visitActive = in_array(Yii::$app->controller->getRoute(), [
  'nb/visit/index',
  'nb/visit/create',
  'nb/visit/update',
  'nb/visit/screening',
  'nb/visit/disease',
  'nb/visit/discharge',
  'nb/visit-develop/create',
]);
?>

<?= Nav::widget([
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-time"></i>  ประวัติการตรวจ',
            'url' => ['/nb/visit/index', 'id' => $id],
            'active' => $visitActive,
        ],
        [
            'label' => '<i class="glyphicon glyphicon-edit"></i> ประวัติเด็กทารก',
            'url' => ['/nb/person/update', 'id' => $id],
        ],
        [
            'label' => '<i class="glyphicon glyphicon-link"></i> รายละเอียดการคลอด',
            'url' => ['/nb/person/newborn-baby', 'id' => $id],
        ],
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> ประวัติมารดา',
            'url' => ['/nb/person/parent', 'id' => $id],
        ],
    ],
    'options' => ['class' => 'nav-tabs'], // set this to nav-tab to get tab-styled navigation
]);
?>
