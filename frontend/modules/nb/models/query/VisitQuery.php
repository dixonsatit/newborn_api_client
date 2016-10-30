<?php

namespace frontend\modules\nb\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\Visit]].
 *
 * @see \frontend\modules\nb\models\Visit
 */
class VisitQuery extends \yii\db\ActiveQuery
{
    public function byPersonId($patient_id)
    {
        return $this->andWhere('patient_id = :patient_id',[
          ':patient_id' => $patient_id
        ]);
    }

    public function byHospitalId($hospital_id)
    {
        return $this->andWhere('hospcode = :hospcode',[
          ':hospcode' => $hospital_id
        ]);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Visit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Visit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
