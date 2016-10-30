<?php

namespace frontend\modules\nb\models\query;

use frontend\modules\nb\models\Icdcode; 

/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\Icdcode]].
 *
 * @see \frontend\modules\nb\models\Icdcode
 */
class IcdcodeQuery extends \yii\db\ActiveQuery
{
    public function icd10()
    {
        return $this->andWhere(['type'=>Icdcode::TYPE_ICD10]);
    }

    public function icd9()
    {
        return $this->andWhere(['type'=>Icdcode::TYPE_ICD9]);
    }

    public function findAllByCode(Array $code)
    {
      return $this->andWhere(['code'=>$code]);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Icdcode[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Icdcode|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
