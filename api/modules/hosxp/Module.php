<?php

namespace api\modules\hosxp;

/**
 * hosxp module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'api\modules\hosxp\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

         $this->modules = [
            'v1' => [
                'class' => 'api\modules\hosxp\modules\v1\Module',
            ],
        ];
    }
}
