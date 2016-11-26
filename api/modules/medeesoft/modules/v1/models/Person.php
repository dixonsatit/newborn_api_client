<?php

namespace api\modules\medeesoft\modules\v1\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property string $HOSPCODE
 * @property string $CID
 * @property string $PID
 * @property string $HID
 * @property string $PRENAME
 * @property string $NAME
 * @property string $LNAME
 * @property string $HN
 * @property string $SEX
 * @property string $BIRTH
 * @property string $MSTATUS
 * @property string $OCCUPATION_OLD
 * @property string $OCCUPATION_NEW
 * @property string $RACE
 * @property string $NATION
 * @property string $RELIGION
 * @property string $EDUCATION
 * @property string $FSTATUS
 * @property string $FATHER
 * @property string $MOTHER
 * @property string $COUPLE
 * @property string $VSTATUS
 * @property string $MOVEIN
 * @property string $DISCHARGE
 * @property string $DDISCHARGE
 * @property string $ABOGROUP
 * @property string $RHGROUP
 * @property string $LABOR
 * @property string $PASSPORT
 * @property string $TYPEAREA
 * @property string $D_UPDATE
 * @property string $ID
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    public static function primaryKey()
    {
        return ['PID'];
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
            [['HOSPCODE', 'PID', 'PRENAME', 'NAME', 'LNAME', 'SEX', 'BIRTH', 'NATION', 'TYPEAREA', 'D_UPDATE'], 'required'],
            [['BIRTH', 'MOVEIN', 'DDISCHARGE', 'D_UPDATE'], 'safe'],
            [['HOSPCODE'], 'string', 'max' => 5],
            [['CID', 'FATHER', 'MOTHER', 'COUPLE'], 'string', 'max' => 13],
            [['PID', 'HN', 'PASSPORT'], 'string', 'max' => 15],
            [['HID'], 'string', 'max' => 14],
            [['PRENAME', 'OCCUPATION_OLD', 'RACE', 'NATION'], 'string', 'max' => 3],
            [['NAME', 'LNAME'], 'string', 'max' => 50],
            [['SEX', 'MSTATUS', 'FSTATUS', 'VSTATUS', 'DISCHARGE', 'ABOGROUP', 'RHGROUP', 'TYPEAREA'], 'string', 'max' => 1],
            [['OCCUPATION_NEW'], 'string', 'max' => 4],
            [['RELIGION', 'EDUCATION', 'LABOR'], 'string', 'max' => 2],
            [['ID'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOSPCODE' => 'Hospcode',
            'CID' => 'Cid',
            'PID' => 'Pid',
            'HID' => 'Hid',
            'PRENAME' => 'Prename',
            'NAME' => 'Name',
            'LNAME' => 'Lname',
            'HN' => 'Hn',
            'SEX' => 'Sex',
            'BIRTH' => 'Birth',
            'MSTATUS' => 'Mstatus',
            'OCCUPATION_OLD' => 'Occupation  Old',
            'OCCUPATION_NEW' => 'Occupation  New',
            'RACE' => 'Race',
            'NATION' => 'Nation',
            'RELIGION' => 'Religion',
            'EDUCATION' => 'Education',
            'FSTATUS' => 'Fstatus',
            'FATHER' => 'Father',
            'MOTHER' => 'Mother',
            'COUPLE' => 'Couple',
            'VSTATUS' => 'Vstatus',
            'MOVEIN' => 'Movein',
            'DISCHARGE' => 'Discharge',
            'DDISCHARGE' => 'Ddischarge',
            'ABOGROUP' => 'Abogroup',
            'RHGROUP' => 'Rhgroup',
            'LABOR' => 'Labor',
            'PASSPORT' => 'Passport',
            'TYPEAREA' => 'Typearea',
            'D_UPDATE' => 'D  Update',
            'ID' => 'ID',
        ];
    }

    /**
     * @inheritdoc
     * @return PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonQuery(get_called_class());
    }

    public function getAddress()
    {
        return $this->hasOne(Address::className(),['PID'=>'PID']);
    }

    public function extraFields()
    {
        return ['address'];
    }
}
