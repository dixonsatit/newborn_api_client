<?php

namespace frontend\modules\nb\models;

use Yii;
use common\behaviors\AttributeValueBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%patient_visit}}".
 *
 * @property int $visit_id
 * @property string $seq
 * @property int $patient_id
 * @property string $hospcode
 * @property string $hn
 * @property string $date
 * @property string $clinic
 * @property string $pttype
 * @property int $age
 * @property string $age_type
 * @property string $result
 * @property string $referin
 * @property string $referout
 * @property float $head_size
 * @property float $height
 * @property float $weight
 * @property float $waist
 * @property int $bp_max
 * @property int $bp_min
 * @property string $inp_id
 * @property string $tsh_pku
 * @property string $tsh_pku_date
 * @property string $tsh_pku_time
 * @property string $tsh_pku_result
 * @property string $oae
 * @property string $oae_date
 * @property string $oae_abr
 * @property string $oae_right
 * @property string $oae_left
 * @property string $oae_result
 * @property string $ivh_ult_brain
 * @property string $ivh_date
 * @property string $ivh_result
 * @property string $rop
 * @property string $rop_date
 * @property string $rop_result
 * @property string $rop_hosp_appointment
 * @property string $lastupdate
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property string $ga
 * @property string $hc
 * @property string $length
 * @property string $af
 * @property string $x
 * @property string $foster_name
 * @property int $milk
 * @property int $milk_milk_powder
 * @property int $milk_powder
 * @property string $vaccine
 * @property string $vaccine_other
 * @property string $disease
 * @property string $complication
 * @property string $procedure_code
 * @property string $summary
 * @property PatientVisitClinic $patientVisitClinic
 * @property PatientVisitDiag[] $patientVisitDiags
 * @property PatientVisitProcedure[] $patientVisitProcedures
 */
class Visit extends \yii\db\ActiveRecord
{
    use \frontend\modules\nb\traits\ItemsAliasTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%patient_visit}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'hospcode', 'hn'], 'required'],
            [['patient_id', 'bp_max', 'bp_min', 'created_by', 'updated_by', 'created_at', 'updated_at', 'milk', 'milk_milk_powder', 'milk_powder', 'discharge_status'], 'integer'],
            [['date', 'refer_date', 'discharge_date', 'tsh_pku_date', 'tsh_pku_time', 'oae_date', 'oae_abr', 'ivh_date', 'rop_date', 'lastupdate', 'vaccine', 'disease', 'complication', 'procedure_code'], 'safe'],
            [['age_type', 'tsh_pku_result', 'ivh_result', 'summary'], 'string'],
            [['head_size', 'height', 'weight', 'waist'], 'number'],
            [['seq', 'hn', 'inp_id'], 'string', 'max' => 15],
            [['hospcode', 'referin', 'referout'], 'string', 'max' => 5],
            [['clinic', 'pttype'], 'string', 'max' => 6],
            [['result'], 'string', 'max' => 4],
            [['tsh_pku', 'oae', 'ivh_ult_brain', 'rop'], 'string', 'max' => 3],
            [['oae_right', 'oae_left', 'oae_result', 'rop_result', 'rop_hosp_appointment'], 'string', 'max' => 255],
            [['ga', 'hc', 'length', 'af', 'x'], 'string', 'max' => 20],
            [['foster_name','age'], 'string', 'max' => 100],
            [['vaccine_other'], 'string', 'max' => 200],
            [['refer_province_code', 'refer_hospcode', 'refer_from_hospcode'], 'string', 'max' => 6],
        ];
    }

    public function behaviors()
    {
        return [
        [
            'class' => AttributeValueBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_AFTER_FIND => ['date', 'discharge_date', 'refer_date'],
            ],
            'value' => function ($event, $attribute) {
                return $this->setThaiFormatdate($attribute);
            },
        ],
        [
            'class' => AttributeValueBehavior::className(),
            'attributes' => [
              ActiveRecord::EVENT_BEFORE_INSERT => ['date', 'discharge_date', 'refer_date'],
              ActiveRecord::EVENT_BEFORE_UPDATE => ['date', 'discharge_date', 'refer_date'],
            ],
            'value' => function ($event, $attribute) {
                return $this->setStandardFormatdate($attribute);
            },
        ],
        // [
        //     'class' => AttributeValueBehavior::className(),
        //     'attributes' => [
        //         ActiveRecord::EVENT_AFTER_FIND => ['vaccine','disease','complication','procedure_code'],
        //     ],
        //     'value' => function ($event, $attribute) {
        //         return empty($this->{$attribute}) ? [] : explode(',',$this->vaccine);
        //     },
        // ],

        [
            'class' => AttributeValueBehavior::className(),
            'attributes' => [
              ActiveRecord::EVENT_BEFORE_INSERT => ['vaccine', 'disease', 'complication', 'procedure_code'],
              ActiveRecord::EVENT_BEFORE_UPDATE => ['vaccine', 'disease', 'complication', 'procedure_code'],
            ],
            'value' => function ($event, $attribute) {
                return is_array($this->{$attribute}) ? implode(',', $this->{$attribute}) : '';
            },
        ],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'seq' => 'Seq',
            'patient_id' => 'Patient ID',
            'hospcode' => 'Hospcode',
            'hn' => 'HN',
            'date' => 'วันที่ตรวจ',
            'clinic' => 'Clinic',
            'pttype' => 'Pttype',
            'age' => 'อายุปัจจุบัน',
            'age_type' => 'Age Type',
            'result' => 'Result',
            'referin' => 'Referin',
            'referout' => 'Referout',
            'head_size' => 'Head Size',
            'height' => 'Height',
            'weight' => 'Weight',
            'waist' => 'Waist',
            'bp_max' => 'Bp Max',
            'bp_min' => 'Bp Min',
            'inp_id' => 'Inp ID',
            'tsh_pku' => 'Tsh Pku',
            'tsh_pku_date' => 'Tsh Pku Date',
            'tsh_pku_time' => 'Tsh Pku Time',
            'tsh_pku_result' => 'Tsh Pku Result',
            'oae' => 'Oae',
            'oae_date' => 'Oae Date',
            'oae_abr' => 'Oae Abr',
            'oae_right' => 'Oae Right',
            'oae_left' => 'Oae Left',
            'oae_result' => 'Oae Result',
            'ivh_ult_brain' => 'Ivh Ult Brain',
            'ivh_date' => 'Ivh Date',
            'ivh_result' => 'Ivh Result',
            'rop' => 'Rop',
            'rop_date' => 'Rop Date',
            'rop_result' => 'Rop Result',
            'rop_hosp_appointment' => 'Rop Hosp Appointment',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ga' => 'GA',
            'hc' => 'Hc',
            'length' => 'Length',
            'af' => 'Af',
            'x' => 'X',
            'foster_name' => 'ผู้เลี้ยงดู',
            'milk' => 'ได้รับนม',
            'milk_milk_powder' => 'นมแม่ + นมผสม',
            'milk_powder' => 'นมผสมอย่างเดียว',
            'vaccine' => 'Vaccine',
            'vaccine_other' => 'Vaccine Other',
            'disease' => 'Disease',
            'complication' => 'Complication',
            'procedure_code' => 'Procedure Code',
            'summary' => 'สรุปผลตรวจ',
            'hospitalName' => 'ชื่อสถานพยาบาล',
            'refer_province_code' => 'จังหวัด',
            'refer_hospcode' => 'สถานพยาบาลที่ส่ง Refer',
            'discharge_date' => 'วันที่จำหน่าย',
            'discharge_status' => 'สถานะการจำหน่าย',
            'refer_date' => 'วันที่ส่ง Rerer',
        ];
    }

    public function fieldToArray(array $fields)
    {
        foreach ($fields as $key => $field) {
            $this->{$field} = empty($this->{$field}) ? [] : explode(',', $this->{$field});
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return \frontend\modules\nb\models\query\VisitQuery the active query used by this AR class
     */
    public static function find()
    {
        return new \frontend\modules\nb\models\query\VisitQuery(get_called_class());
    }

    private function getRelationField($relationName, $fieldName, $defaultValue = '')
    {
        return isset($this->{$relationName}) ? $this->{$relationName}->{$fieldName} : $defaultValue;
    }

    public function getHospital()
    {
        return $this->hasOne(Hospital::className(), ['off_id' => 'hospcode']);
    }

    public function getHospitalName()
    {
        return $this->getRelationField('hospital', 'name');
    }

    public function getIsOwnHospital()
    {
        return $this->hospcode == Yii::$app->user->identity->profile->hcode;
    }

    public function getItemAilas($key)
    {
        $items = [
            'province' => [
            '40' => 'ขอนแก่น',
            '44' => 'มหาสารคาม',
            '45' => 'ร้อยเอ็ด',
            '46' => 'กาฬสินธุ์',
            '0' => 'อื่นๆ',
            ],
        ];
        return array_key_exists($key, $items) ? $items[$key] : [];
    }

    public function getItemProvince()
    {
        return $this->getItemAilas('province');
    }

    public function getProvinceName()
    {
        $items = $this->getItemAilas('province');
        return array_key_exists($this->refer_province_code, $items) ? $items[$this->refer_province_code] : '';
    }

    public function getHospitalReferTo()
    {
        return $this->hasOne(Hospital::className(), ['off_id' => 'refer_hospcode']);
    }

    public function getHospitalReferToName()
    {
        return $this->getRelationField('hospitalReferTo','name');
    }

    public function getHospitalReferFrom()
    {
        return $this->hasOne(Hospital::className(), ['off_id' => 'refer_from_hospcode']);
    }

    public function getHospitalReferFromName()
    {
        return $this->getRelationField('hospitalReferFrom','name');
    }

    public function getRefer()
    {
        return $this->hasOne(Refer::className(), ['visit_id' => 'visit_id']);
    }

    public function getIsRefer(){
        return !empty($this->refer_hospcode);
    }
    public function getIsRecive(){
        return !empty($this->refer_from_hospcode);
    }
}
