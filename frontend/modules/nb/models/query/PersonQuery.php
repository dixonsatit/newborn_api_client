<?php

namespace frontend\modules\nb\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\Person]].
 *
 * @see \frontend\modules\nb\models\Person
 */
class PersonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Person[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Person|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
