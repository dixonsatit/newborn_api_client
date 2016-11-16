<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = 'API Documents';
$this->params['breadcrumbs'][] = $this->title;

$apiType        = ArrayHelper::getValue($setting,'api_type');
$apiVersion     = ArrayHelper::getValue($setting,'version');
$accessToken    = Yii::$app->user->identity->access_token;
$baseApiUrl     = Url::base(true).'/'.$apiType.'/'.$apiVersion.'/';
?>

<div class="xpanel">
    <div class="xpanel-heading-sm">
    <div class="xpanel-title">API Patient: <i><small>ข้อมูลผู้ป่วย</small></i></div>
    </div>
    <div class="panel-body">
         <pre><span class="label label-primary">GET</span> <?=$baseApiUrl;?>patients <span class="pull-right">แสดงรายการผู้ป่วยทั้งหมดต่อหน้า</span></pre>
         <pre><span class="label label-primary">GET</span> <?=$baseApiUrl;?>patients/search?lname=สาธิต <span class="pull-right">ค้นรายการผู้ป่วยโดยระบุฟิวส์</span></pre>
         <pre><span class="label label-primary">GET</span> <?=$baseApiUrl;?>patients/123 <span class="pull-right">แสดงรายการผู้ป่วยโดยค้นจาก primary key</span></pre>
         <pre><span class="label label-success">POST</span> <del><?=$baseApiUrl;?>patients</del> <span class="pull-right">เพิ่มรายการผู้ป่วย</span></pre>
         <pre><span class="label label-warning">PATCH</span> <span class="label label-warning">PUT</span> <del><?=$baseApiUrl;?>patients</del> <span class="pull-right">แก้ไขรายการผู้ป่วย</span></pre>
         <pre><span class="label label-danger">DELETE</span> <del><?=$baseApiUrl;?>patients/123</del> <span class="pull-right">ลบรายการผู้ป่วย</span></pre>
    </div>
</div>

<div class="xpanel">
    <div class="xpanel-heading-sm">
    <div class="xpanel-title">Authentication: Query parameter</div>
    </div>
    <div class="panel-body">
        URI: <code><?=$baseApiUrl?>patients?<strong>access_token</strong>=xxxxxxx</code>
<br><br>
       <pre><span class="label label-primary">GET</span> <?=Html::a($baseApiUrl.'patients?access-token='.$accessToken,$baseApiUrl.'patients?access-token='.$accessToken);?> </pre>


    <h3>cURL</h3>
<pre>
curl -X GET -H "Cache-Control: no-cache" "<?=$baseApiUrl?>patients?access-token=<?=$accessToken?>"
</pre>

<h3>JQuery</h3>
<pre>
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "<?=$baseApiUrl?>patients?access-token=<?=$accessToken?>",
  "method": "GET",
  "headers": {
    "cache-control": "no-cache"
  }
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
</pre>

    </div>
</div>

<div class="xpanel">
    <div class="xpanel-heading-sm">
    <div class="xpanel-title">Authentication: HTTP Bearer Tokens</div>
    </div>
    <div class="panel-body">
        URI: <code><?=$baseApiUrl?>patients</code>
<br><br>


<h3>cURL</h3>
<pre>
curl -X GET -H "Authorization: Bearer <?=$accessToken?>" -H "Cache-Control: no-cache" "<?=$baseApiUrl?>patients"
</pre>

<h3>JQuery</h3>
<pre>
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "<?=$baseApiUrl?>patients",
  "method": "GET",
  "headers": {
    "authorization": "Bearer <?=$accessToken?>",
    "cache-control": "no-cache"
  }
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
</pre>

    </div>
</div>


