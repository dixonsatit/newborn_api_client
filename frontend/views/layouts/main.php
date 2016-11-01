<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\modules\nb\models\Refer;
use common\widgets\Alert;

AppAsset::register($this);
$hospitalName = '';
$countRefer='';
if(!Yii::$app->user->isGuest) {
  $hospitalName = isset(Yii::$app->user->identity->profile->hospital) ? Yii::$app->user->identity->profile->hospitalName : '';
  $countRefer = Refer::find()->byReferToHospcode()->isNotAccept()->count();
  $countRefer = $countRefer==0? '':'<span style="background-color:#FF9800;" class="badge">'.$countRefer.'</span>';
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['app.brandLabel'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        //['label' => 'Home', 'url' => ['/site/index']],
        //['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ลงทะเบียน', 'url' => ['/user/registration/register']];
        $menuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']];
    } else {
        $menuItems[] = ['label' => '<i class="glyphicon glyphicon-th-list"></i> '.'ทะเบียนเด็กทารก', 'url' => ['/nb/person/index']];
        $menuItems[] = ['label' => '<i class="fa fa-ambulance"></i> ทะเบียน Refer'.$countRefer, 'items' => [
            ['label' => 'รับ Refer', 'url' => ['/nb/refer/in']],
            ['label' => 'ส่งต่อ Refer', 'url' => ['/nb/refer/out']],
        ]];
       $menuItems[] = ['label' => ' <i class="glyphicon glyphicon-user"></i> '.strtoupper(Yii::$app->user->identity->username) .' : '.$hospitalName.'', 'items' => [
            ['label' => 'Profile', 'url' => ['/user/settings/profile']],
            ['label' => 'Api Setting', 'url' => ['/api-settings/index']],
            '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
        ]];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ระบบข้อมูลสุขภาพเขตที่ 7 <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<?=$this->render('_google_analytics');?>
</body>
</html>
<?php $this->endPage() ?>
