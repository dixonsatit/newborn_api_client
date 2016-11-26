<?php

namespace api\modules\medeesoft;

/**
 * jhcis module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'api\modules\medeesoft\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules =  [
            'v1' => [
                'class' => 'api\modules\medeesoft\modules\v1\Module',
            ],
        ];
    }
}
