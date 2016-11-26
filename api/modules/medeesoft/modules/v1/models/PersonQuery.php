<?php

namespace api\modules\medeesoft\modules\v1\models;

/**
 * This is the ActiveQuery class for [[Person]].
 *
 * @see Person
 */
class PersonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Person[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Person|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
