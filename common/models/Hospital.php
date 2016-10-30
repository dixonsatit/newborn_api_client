<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "co_hospitals".
 *
 * @property integer $ID
 * @property string $Off_id
 * @property string $Off_name
 * @property string $Off_name1
 * @property string $Off_name2
 * @property string $Off_type
 * @property string $Changwat
 * @property string $Amphur
 * @property string $Tambon
 * @property string $Mooban
 * @property string $Moo
 * @property string $Cup_code
 * @property string $Pcu_code
 */
class Hospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Off_id', 'Off_type'], 'required'],
            [['Off_id', 'Cup_code', 'Pcu_code'], 'string', 'max' => 5],
            [['Off_name'], 'string', 'max' => 100],
            [['Off_name1'], 'string', 'max' => 255],
            [['Off_name2'], 'string', 'max' => 50],
            [['Off_type', 'Changwat', 'Moo'], 'string', 'max' => 2],
            [['Amphur'], 'string', 'max' => 4],
            [['Tambon'], 'string', 'max' => 6],
            [['Mooban'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Off_id' => 'Off ID',
            'Off_name' => 'Off Name',
            'Off_name1' => 'Off Name1',
            'Off_name2' => 'Off Name2',
            'Off_type' => 'Off Type',
            'Changwat' => 'Changwat',
            'Amphur' => 'Amphur',
            'Tambon' => 'Tambon',
            'Mooban' => 'Mooban',
            'Moo' => 'Moo',
            'Cup_code' => 'Cup Code',
            'Pcu_code' => 'Pcu Code',
        ];
    }

    /**
     * @inheritdoc
     * @return HospitalsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HospitalQuery(get_called_class());
    }
}
