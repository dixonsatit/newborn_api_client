<?php

namespace api\modules\kkh\modules\v1\models;

/**
 * This is the ActiveQuery class for [[Patient]].
 *
 * @see Patient
 */
class PatientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Patient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Patient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
