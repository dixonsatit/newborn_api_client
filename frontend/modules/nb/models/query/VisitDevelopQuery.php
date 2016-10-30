<?php

namespace frontend\modules\nb\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\VisitDevelop]].
 *
 * @see \frontend\modules\nb\models\VisitDevelop
 */
class VisitDevelopQuery extends \yii\db\ActiveQuery
{
    public function byVisitId($visit_id)
    {
        return $this->andWhere('visit_id = :visit_id',[
          ':visit_id'=> $visit_id
        ]);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\VisitDevelop[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\VisitDevelop|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
