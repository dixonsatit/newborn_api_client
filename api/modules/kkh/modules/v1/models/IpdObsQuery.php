<?php

namespace api\modules\kkh\modules\v1\models;

/**
 * This is the ActiveQuery class for [[IpdObs]].
 *
 * @see IpdObs
 */
class IpdObsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return IpdObs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IpdObs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
