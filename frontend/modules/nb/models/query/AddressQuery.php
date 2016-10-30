<?php

namespace frontend\modules\nb\models\query;

use frontend\modules\nb\models\Changwat;
use frontend\modules\nb\models\Amphoe;
use frontend\modules\nb\models\Tambon;

/**
 * This is the ActiveQuery class for [[Address]].
 *
 * @see Address
 */
class AddressQuery extends \yii\db\ActiveQuery
{
    public $type;

    public function prepare($builder)
    {
        if($this->type == Changwat::TYPE)
        {
          $this->andWhere('SUBSTRING(code,-4) = "0000"');
        }
        elseif($this->type == Amphoe::TYPE)
        {
          $this->andWhere('SUBSTRING(code,-4) != "0000" AND SUBSTRING(code,-2) = "00"');
        }
        elseif($this->type == Tambon::TYPE)
        {
          $this->andWhere('substring(code,-4) != "0000" AND substring(code,-2) != "00"');
        }
        return parent::prepare($builder);
    }

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Address[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Address|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function getAmphoeByChangwatID($changwatID)
    {
      return $this->andWhere('SUBSTRING(code,1,2) = :id', [':id' => $changwatID])
             ->select(['abbr name', 'SUBSTRING(code,3,2) id'])
             ->asArray();
    }

    public function getTambonByAmphoeID($amphoeID)
    {
      return $this->andWhere('SUBSTRING(code,1,4) = :id', [':id' => $amphoeID])
             ->select(['abbr name', 'SUBSTRING(code,5,2) id'])
             ->asArray();
    }

    public function loadInit($id,$type){
      if(in_array($type,['ampur','tambon'])){
        $condition  = ($type == 'ampur') ? 'SUBSTRING(code,1,2) = :id AND SUBSTRING(code,-2) != "00"' : 'SUBSTRING(code,1,4) = :id AND SUBSTRING(code,-2) != "00"';
        $fieldID    = ($type == 'ampur') ? 'SUBSTRING(code,3,2)' : 'SUBSTRING(code,5,2)';
        return $this->andWhere($condition, [':id' => $id])
               ->select(['abbr'])
               ->indexBy($fieldID);
      }
      return [];
    }
}
