<?php

namespace frontend\modules\nb\models;

/**
 * This is the ActiveQuery class for [[VisitScreening]].
 *
 * @see VisitScreening
 */
class VisitScreeningQuery extends \yii\db\ActiveQuery
{
    public function byPatientVisit($visit_id,$type)
    {
        return $this->andWhere(['visit_id'=>$visit_id,'type'=>$type]);
    }

    /**
     * @inheritdoc
     * @return VisitScreening[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VisitScreening|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
