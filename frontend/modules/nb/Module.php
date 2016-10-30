<?php

namespace frontend\modules\nb;

/**
 * nb module definition class.
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\nb\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->modules = [
          'api' => [
            'class' => 'frontend\modules\nb\modules\api\Module',
          ]
        ];
    }
}
