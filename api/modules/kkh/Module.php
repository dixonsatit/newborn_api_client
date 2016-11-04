<?php

namespace api\modules\kkh;

/**
 * kkh module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'api\modules\kkh\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

         $this->modules = [
            'v1' => [
                'class' => 'api\modules\kkh\modules\v1\Module',
            ],
        ];
    }
}
