<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use common\models\user\User;

/**
 * This is the model class for table "refer".
 *
 * @property integer $id
 * @property integer $hospcode
 * @property integer $patient_id
 * @property integer $visit_id
 * @property integer $refer_to
 * @property integer $status
 * @property integer $irefer_id
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class Refer extends \yii\db\ActiveRecord
{
    use \frontend\modules\nb\traits\ItemsAliasTrait;

    const STATUS_SEND = 1;
    const STATUS_ACCEPT = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refer';
    }

    public function behaviors()
    {
        return [
             TimestampBehavior::className(),
             BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'patient_id', 'visit_id', 'refer_to'], 'required'],
            [['hospcode','refer_to'],'string','max'=>6],
            [['patient_id', 'visit_id', 'status', 'irefer_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospcode' => 'Hospcode',
            'patient_id' => 'Patient ID',
            'visit_id' => 'Visit ID',
            'refer_to' => 'Refer To',
            'status' => 'สถานะ',
            'statusLabel' => 'สถานะการส่งต่อ',
            'irefer_id' => 'Irefer ID',
            'created_at' => 'ลงทะเบียนวันที่',
            'created_by' => 'โดย',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'refer_date' => 'วันที่ส่ง',
            'personFullname' => 'ชื่อ-นามสกุล',
            'hospitalName' => 'จากโรงพยาบาล',
            'hospitalOutName' => 'ส่งต่อไปที่โรงพยาบาล',
            'userFullname' => 'ลงทะเบียนโดย',
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\query\ReferQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\modules\nb\models\query\ReferQuery(get_called_class());
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUserFullname()
    {
        return isset($this->user) ? $this->user->profile->fullname : '';
    }

    public function getVisit()
    {
        return $this->hasOne(Visit::className(), ['visit_id' => 'visit_id']);
    }

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['newborn_id' => 'patient_id']);
    }

    public function getPersonFullname()
    {
          return $this->getRelationField('person','fullName');
    }

    public function getHospital()
    {
        return $this->hasOne(Hospital::className(), ['off_id' => 'hospcode']);
    }

    public function getHospitalName()
    {
        return $this->getRelationField('hospital','name');
    }

    public function getHospitalOut()
    {
        return $this->hasOne(Hospital::className(), ['off_id' => 'refer_to']);
    }

    public function getHospitalOutName()
    {
        return $this->getRelationField('hospitalOut','name');
    }

    public function getIsOwnHospital()
    {
        return $this->hospcode == Yii::$app->user->identity->profile->hcode;
    }

    public function getStatusLabel(){
        return $this->getItemsLabel('refer_status_out',$this->status);
    }

    public function getIsSend(){
        return self::STATUS_SEND == $this->status;
    }

     
}
