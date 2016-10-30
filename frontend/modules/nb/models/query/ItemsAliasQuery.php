<?php

namespace frontend\modules\nb\models\query;

use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * This is the ActiveQuery class for [[ItemsAlias]].
 *
 * @see ItemsAlias
 */
class ItemsAliasQuery extends \yii\db\ActiveQuery
{
    private $_items = [];

    public function load($key)
    {
        if(!array_key_exists($key,$this->_items)){
          $this->setItem($key);
        }
        return $this->getItem($key);
    }

    public function setItem($key)
    {
        $this->_items[$key] = $this->findItemByKey($key);
    }

    public function getItem($key)
    {
        return ArrayHelper::getValue($this->_items, $key);
    }

    private function findItemByKey($key)
    {
        if (!empty($items = $this->select('value')->where(['group' => $key])->indexBy('key')->column())) {
            return $items;
        } else {
            throw new NotFoundHttpException('The Items '.$key.' does not exist.');
        }
    }

    /**
     * @inheritdoc
     * @return ItemsAlias[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemsAlias|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
