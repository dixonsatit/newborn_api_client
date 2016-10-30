<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Hospitals]].
 *
 * @see Hospitals
 */
class HospitalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Hospitals[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hospitals|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
