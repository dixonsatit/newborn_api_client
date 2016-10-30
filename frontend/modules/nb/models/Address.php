<?php

namespace frontend\modules\nb\models;

use Yii;
use frontend\modules\nb\models\Changwat;
use frontend\modules\nb\models\Amphoe;
use frontend\modules\nb\models\Tambon;

/**
 * This is the model class for table "lib_address".
 *
 * @property integer $ref
 * @property string $code
 * @property string $abbr
 * @property string $name
 * @property string $name2
 * @property string $name_full
 */
class Address extends \yii\db\ActiveRecord
{
    public $type;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
         return '{{%lib_address%}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 6],
            [['abbr'], 'string', 'max' => 50],
            [['name', 'name2'], 'string', 'max' => 100],
            [['name_full'], 'string', 'max' => 220]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => 'Ref',
            'code' => 'Code',
            'abbr' => 'Abbr',
            'name' => 'Name',
            'name2' => 'Name2',
            'name_full' => 'Name Full',
        ];
    }

    /**
     * @inheritdoc
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\modules\nb\models\query\AddressQuery(get_called_class());
    }


}
