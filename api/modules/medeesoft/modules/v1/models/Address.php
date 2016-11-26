<?php

namespace api\modules\medeesoft\modules\v1\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $ADDRESSTYPE
 * @property string $HOUSE_ID
 * @property string $HOUSETYPE
 * @property string $ROOMNO
 * @property string $CONDO
 * @property string $HOUSENO
 * @property string $SOISUB
 * @property string $SOIMAIN
 * @property string $ROAD
 * @property string $VILLANAME
 * @property string $VILLAGE
 * @property string $TAMBON
 * @property string $AMPUR
 * @property string $CHANGWAT
 * @property string $TELEPHONE
 * @property string $MOBILE
 * @property string $D_UPDATE
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('api');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOSPCODE', 'PID', 'ADDRESSTYPE', 'HOUSETYPE', 'D_UPDATE'], 'required'],
            [['D_UPDATE'], 'safe'],
            [['HOSPCODE'], 'string', 'max' => 5],
            [['PID', 'TELEPHONE', 'MOBILE'], 'string', 'max' => 15],
            [['ADDRESSTYPE', 'HOUSETYPE'], 'string', 'max' => 1],
            [['HOUSE_ID'], 'string', 'max' => 11],
            [['ROOMNO'], 'string', 'max' => 10],
            [['CONDO', 'HOUSENO'], 'string', 'max' => 75],
            [['SOISUB', 'SOIMAIN', 'ROAD', 'VILLANAME'], 'string', 'max' => 255],
            [['VILLAGE', 'TAMBON', 'AMPUR', 'CHANGWAT'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'ADDRESSTYPE' => 'Addresstype',
            'HOUSE_ID' => 'House  ID',
            'HOUSETYPE' => 'Housetype',
            'ROOMNO' => 'Roomno',
            'CONDO' => 'Condo',
            'HOUSENO' => 'Houseno',
            'SOISUB' => 'Soisub',
            'SOIMAIN' => 'Soimain',
            'ROAD' => 'Road',
            'VILLANAME' => 'Villaname',
            'VILLAGE' => 'Village',
            'TAMBON' => 'Tambon',
            'AMPUR' => 'Ampur',
            'CHANGWAT' => 'Changwat',
            'TELEPHONE' => 'Telephone',
            'MOBILE' => 'Mobile',
            'D_UPDATE' => 'D  Update',
        ];
    }

    /**
     * @inheritdoc
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
}
