<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = 'Newborn Api Client';
$apiType = ArrayHelper::getValue($setting,'api_type');
$apiVersion = ArrayHelper::getValue($setting,'version');
$accessToken =  Yii::$app->user->identity->access_token;
$baseApiUrl = Url::base(true).'/'.$apiType.'/'.$apiVersion.'/';

?>
<div class="site-index">

    <div class="jumbotron">
        <p><?=Html::a('<i class="glyphicon glyphicon-cog"></i> ตั้งค่า API V.1.0.5',['api-settings/index'],[
            'class'=>'btn btn-default btn-lg'
        ]);?>

    </div>

    <h4>API Status</h4>
    <pre><?=$apiType==null ? 'คุณยังไม่ได้ตั้งค่า API' :'<span class="label label-primary">GET</span> '.$baseApiUrl.'patients';?><span class="pull-right">Status Code:  <i id="statusCode">...</i></span></pre>
</div>

<?php $this->registerJs('
var icon = \'<i class="glyphicon glyphicon-remove-circle" style="color:red;"></i>\';
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "'.$baseApiUrl.'patients?access-token='.$accessToken.'",
  "method": "HEAD",
  "headers": {
    "cache-control": "no-cache"
  },
   "statusCode": {
        401: function(xhr) {
            $("#statusCode").html(icon + xhr.status+" "+xhr.statusText);
        },
        404: function(xhr) {
            $("#statusCode").html(icon + xhr.status+" "+xhr.statusText);
        },
        400: function(xhr) {
           $("#statusCode").html(icon + xhr.status+" "+xhr.statusText);
        }
   }
}

$.ajax(settings).done(function (response,e,xhr) {
  $("#statusCode").html(\'<i class="glyphicon glyphicon-ok-circle" style="color:green;"></i> \'+ xhr.status+" "+xhr.statusText);
});


');

