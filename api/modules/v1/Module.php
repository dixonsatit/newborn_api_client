<?php

namespace api\modules\v1;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'api\modules\v1\controllers';
    public function init()
    {
      parent::init();
      Yii::$app->user->enableSession = false;

        // custom initialization code goes here
    }
}
