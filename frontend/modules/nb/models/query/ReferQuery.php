<?php

namespace frontend\modules\nb\models\query;

use Yii;
use frontend\modules\nb\models\Refer;
/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\Refer]].
 *
 * @see \frontend\modules\nb\models\Refer
 */
class ReferQuery extends \yii\db\ActiveQuery
{
    public function byHospcode($code=null)
    {
        return $this->andWhere([
          'refer.hospcode' => $code == null ? Yii::$app->user->identity->profile->hcode : $code
        ]);
    }

    public function byReferToHospcode($code=null)
    {
        return $this->andWhere([
          'refer.refer_to' => $code == null ? Yii::$app->user->identity->profile->hcode : $code
        ]);
    }

    public function isNotAccept($code=null)
    {
        return $this->andWhere([
          'status' => Refer::STATUS_SEND
        ]);
    }

    public function isAccept($code=null)
    {
        return $this->andWhere([
          'status' => Refer::STATUS_ACCEPT
        ]);
    }

    

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Refer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Refer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
