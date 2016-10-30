<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "patient_visit_screening".
 *
 * @property integer $id
 * @property integer $hospcode
 * @property integer $patient_visit
 * @property string $type
 * @property string $check_date
 * @property string $result
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class VisitScreening extends ActiveRecord
{
    use \frontend\modules\nb\traits\ItemsAliasTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_visit_screening';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'check_date',
                  ActiveRecord::EVENT_BEFORE_UPDATE => 'check_date',
              ],
              'value' => function ($event) {
                  return $this->setDateToDb();
              },
          ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['check_date'], 'required'],
            [['hospcode', 'patient_visit', 'created_at', 'updated_at', 'created_by', 'updated_by','oae_left_status','oae_right_status'], 'integer'],
            [['type', 'result','oae_left','oae_right','rop_left','rop_right'], 'string'],
            [['ivh',], 'string','max'=>100],
            [['check_date'], 'safe'],
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
            'patient_visit' => 'Patient Visit',
            'type' => 'Type',
            'check_date' => 'วันที่ตรวจ',
            'result' => 'ผลตรวจ',
            'oae_left' => 'ผลตรวจหูข้างซ้าย',
            'oae_right' => 'ผลตรวจหูข้างขวา',
            'created_at' => 'Created Date',
            'updated_at' => 'Updated Date',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'oae_left_status'=>'ข้างซ้าย',
            'oae_right_status'=>'ข้างขวา',
            'ivh' => 'อื่นๆ ',
            'rop_left' => 'ผลตรวจตาข้างซ้าย',
            'rop_right' => 'ผลตรวจตาข้างขวา',
            'rop_left_stage' => 'ผลตรวจตาข้างซ้าย',
            'rop_right_stage' => 'ผลตรวจตาข้างขวา',
            'rop_left_zone' => 'Zone',
            'rop_right_zone' => 'Zone',
            'rop_left_plus' => 'With Plus',
            'rop_right_plus' => 'With Plus',
            'rop_plus' => 'ROP Plus',
            'ivh_grade'=> 'IVH Grade'
        ];
    }

    /**
     * @inheritdoc
     * @return VisitScreeningQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VisitScreeningQuery(get_called_class());
    }

    public function setDateToDb(){
      $date = (date("Y",strtotime($this->check_date))-543).date("-m-d",strtotime($this->check_date)).' '.date("H:i",strtotime($this->check_date));
      return $this->validateDate($date)? $date : '0000-00-00 00:00:00';
    }

    function validateDate($date, $format = 'Y-m-d H:i')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function getItemsType()
    {
      return [
        'tshpku',
        'oae',
        'ivh',
        'untrasound',
        'rop'
      ];
    }
}
