<?php

namespace frontend\modules\nb\models;

use Yii;

/**
 * This is the model class for table "lib_hospital".
 *
 * @property string $maincode
 * @property string $name
 * @property string $deptcode
 * @property string $deptname
 * @property string $typecode
 * @property string $typename
 * @property string $bed
 * @property string $provcode
 * @property string $provname
 * @property string $amp
 * @property string $ampname
 * @property string $tamboncode
 * @property string $tambonname
 * @property string $moocode
 * @property string $mooname
 * @property string $statuscode
 * @property string $statusname
 * @property string $address
 * @property string $postcode
 * @property string $tel
 * @property string $fax
 * @property string $service_level
 * @property string $service_type
 * @property string $servicecode
 * @property string $on_service
 * @property string $history
 * @property string $init_date
 * @property string $cancel_date
 * @property string $open_date
 * @property string $close_date
 * @property string $lastupdate
 * @property string $a1
 * @property string $a2
 * @property string $code5
 * @property string $off_id
 * @property string $cup
 */
class Hospital extends \yii\db\ActiveRecord
{
    use \frontend\modules\nb\traits\ItemsAliasTrait;
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
            [['maincode', 'name', 'deptcode', 'code5', 'off_id'], 'required'],
            [['maincode', 'deptcode', 'moocode', 'mooname', 'postcode', 'service_level'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 140],
            [['deptname'], 'string', 'max' => 60],
            [['typecode', 'provcode', 'amp', 'tamboncode'], 'string', 'max' => 6],
            [['typename'], 'string', 'max' => 50],
            [['bed', 'off_id', 'cup'], 'string', 'max' => 5],
            [['provname', 'ampname', 'tambonname', 'statusname', 'address', 'service_type'], 'string', 'max' => 100],
            [['statuscode'], 'string', 'max' => 4],
            [['tel', 'fax'], 'string', 'max' => 30],
            [['servicecode', 'close_date', 'lastupdate', 'a1', 'a2'], 'string', 'max' => 20],
            [['on_service'], 'string', 'max' => 40],
            [['history'], 'string', 'max' => 200],
            [['init_date', 'cancel_date', 'open_date'], 'string', 'max' => 16],
            [['code5'], 'string', 'max' => 9],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'maincode' => 'Maincode',
            'name' => 'Name',
            'deptcode' => 'Deptcode',
            'deptname' => 'Deptname',
            'typecode' => 'Typecode',
            'typename' => 'Typename',
            'bed' => 'Bed',
            'provcode' => 'Provcode',
            'provname' => 'Provname',
            'amp' => 'Amp',
            'ampname' => 'Ampname',
            'tamboncode' => 'Tamboncode',
            'tambonname' => 'Tambonname',
            'moocode' => 'Moocode',
            'mooname' => 'Mooname',
            'statuscode' => 'Statuscode',
            'statusname' => 'Statusname',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'tel' => 'Tel',
            'fax' => 'Fax',
            'service_level' => 'Service Level',
            'service_type' => 'Service Type',
            'servicecode' => 'Servicecode',
            'on_service' => 'On Service',
            'history' => 'History',
            'init_date' => 'Init Date',
            'cancel_date' => 'Cancel Date',
            'open_date' => 'Open Date',
            'close_date' => 'Close Date',
            'lastupdate' => 'Lastupdate',
            'a1' => 'A1',
            'a2' => 'A2',
            'code5' => 'Code5',
            'off_id' => 'Off ID',
            'cup' => 'Cup',
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\query\HospitalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\modules\nb\models\query\HospitalQuery(get_called_class());
    }
}
