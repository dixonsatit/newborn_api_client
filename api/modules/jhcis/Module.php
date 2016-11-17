<?php

namespace api\modules\jhcis;

/**
 * jhcis module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'api\modules\jhcis\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules =  [
            'v1' => [
                'class' => 'api\modules\jhcis\modules\v1\Module',
            ],
        ];
    }
}
