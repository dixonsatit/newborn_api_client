<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use common\behaviors\AttributeValueBehavior;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "patient_visit_screening".
 *
 * @property integer $id
 * @property integer $hospcode
 * @property integer $visit_id
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
                'class' => AttributeValueBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => ['check_date'],
                ],
                'value' => function ($event, $attribute) {
                    return $this->setThaiFormatdate($attribute);
                },
            ],
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
            [['hospcode', 'visit_id', 'created_at', 'updated_at', 'created_by', 'updated_by','oae_left_status','oae_right_status','rop_left_zone','rop_right_zone','patient_id'], 'integer'],
            [['type', 'result','oae_left','oae_right','rop_left','rop_right'], 'string'],
            [['ivh','ivh_grade'], 'string','max'=>100],
            [['rop_right_stage','rop_left_stage'], 'string','max'=>100],
            [['rop_left_plus','rop_right_plus'], 'string','max'=>20],
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
            'visit_id' => 'Patient Visit',
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
            'ivh_grade'=> 'IVH Grade',
            'oatLeftStatusLabel'=> 'ด้ายซ้าย',
            'oatRightStatusLabel'=> 'ด้านขวา',
            'ivhGradeLabel'=> 'Grade Label',
            'ropLeftStageLabel'=> 'ผลตรวจตาข้างซ้าย',
            'ropRightStageLabel'=> 'ผลตรวจตาข้างขวา'
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

    public function getOatLeftStatusLabel(){
        return $this->getItemsLabel('success/failed',$this->oae_left_status);
    }

    public function getOatRightStatusLabel(){
        return $this->getItemsLabel('success/failed',$this->oae_right_status);
    }


    public function getRopLeftStageLabel(){
        return $this->getItemsLabel('rop_stage',$this->rop_left_stage);
    }

    public function getRopRightStageLabel(){
        return $this->getItemsLabel('rop_stage',$this->rop_right_stage);
    }

    public function getIvhGradeLabel(){
        return $this->getItemsLabel('ivh_grade',$this->ivh_grade);
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
