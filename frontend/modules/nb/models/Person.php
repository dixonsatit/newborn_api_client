<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use common\behaviors\AttributeValueBehavior;
use yii\db\ActiveRecord;
use DateTime;
/**
 * This is the model class for table "person".
 *
 * @property string $hospcode
 * @property string $cid
 * @property string $pid
 * @property string $hid
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $hn
 * @property string $sex
 * @property string $birth
 * @property string $mstatus
 * @property string $occupation_old
 * @property string $occupation_new
 * @property string $race
 * @property string $nation
 * @property string $religion
 * @property string $education
 * @property string $fstatus
 * @property string $father
 * @property string $mother
 * @property string $couple
 * @property string $vstatus
 * @property string $movein
 * @property string $discharge
 * @property string $ddischarge
 * @property string $abogroup
 * @property string $rhgroup
 * @property string $labor
 * @property string $passport
 * @property string $typearea
 * @property string $d_update
 * @property string $mother_name
 * @property string $father_name
 */
class Person extends ActiveRecord
{
    use \frontend\modules\nb\traits\ItemsAliasTrait;

    public $adBirth;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeValueBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => ['birth', 'register_date','admit_datetime','date_of_resuscitate','discharge_date'],
                ],
                'value' => function ($event, $attribute) {
                    return $this->setThaiFormatdate($attribute);
                },
            ],
            [
                'class' => AttributeValueBehavior::className(),
                'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => ['birth', 'register_date','admit_datetime','date_of_resuscitate','discharge_date'],
                  ActiveRecord::EVENT_BEFORE_UPDATE => ['birth', 'register_date','admit_datetime','date_of_resuscitate','discharge_date'],
                ],
                'value' => function ($event, $attribute) {
                    return $this->setStandardFormatdate($attribute);
                },
            ],
            [
                'class' => AttributeValueBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['cid', 'father', 'mother'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['cid', 'father', 'mother'],
                ],
                'value' => function ($event,$attribute) {
                    return  str_replace('-','', $this->owner->$attribute);
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
            [['hospcode', 'pid', 'cid', 'prename', 'name', 'lname', 'sex', 'birth','mother','mother_name'], 'required'],
            [['birth', 'movein', 'ddischarge', 'd_update','register_date'], 'safe'],
            [['hospcode'], 'string', 'max' => 5],
            [['cid', 'father', 'mother', 'couple'], 'string', 'max' => 17],
            [['pid', 'hn', 'passport'], 'string', 'max' => 15],
            [['hid'], 'string', 'max' => 14],
            [['mother_name','father_name'], 'string', 'max' => 150],
            [['occupation_old', 'race', 'nation'], 'string', 'max' => 3],
            [['prename'], 'string', 'max' => 6],
            [['name', 'lname'], 'string', 'max' => 50],
            [['sex', 'mstatus', 'fstatus', 'vstatus', 'discharge', 'abogroup', 'rhgroup', 'typearea'], 'string', 'max' => 1],
            [['occupation_new'], 'string', 'max' => 4],
            [['religion', 'education', 'labor'], 'string', 'max' => 2],
            [['sex'], 'default', 'value' => 1],

            [['add_houseno'], 'string', 'max' => 10],
            [['add_road','add_village','add_soimain'], 'string', 'max' => 255],
            [['add_changwat','add_ampur','add_tambon'], 'string', 'max' => 2],
            ['add_zip', 'string', 'max' => 5],
            ['add_mobile', 'string', 'max' => 15],

            [['admit_age','newborn_at'], 'integer'],
            [['newborn_refer_from','admit_wardname'], 'string', 'max' => 150],
            [['admit_datetime'],'safe'],

            [['ga','lr_type','birth_weight','height','apgar'], 'string', 'max' => 50],

            [['is_resuscitate','cpr','et_tube','position_ettube','uvc'], 'integer'],
            [['date_of_resuscitate'], 'safe'],
            [['ppv','day_on_ettube','o2'], 'string', 'max' => 50],

            [['discharge_status','discharge_age'], 'integer'],
            [['discharge_date'], 'safe'],

            [['mother_drug_before_born_item','mother_drug_before_born_amount','mother_age','mother_no_of_anc','mother_vdrl','mother_hbsag','mother_congenital_disease','mother_fever','mother_water_break','mother_day_of_water_break','mother_day_of_antibiotic','mother_bloody_show','mother_problem','mother_drug_before_born','mother_amniotic_fluid_type','mother_antibiotic'], 'integer'],
            [['mother_g','mother_p'], 'string', 'max' => 20],
            [['mother_hn','mother_an'], 'string', 'max' => 30],
            [['mother_antibiotic_name','mother_drug_name_before_born'], 'string', 'max' => 150],
            [['mother_congenital_disease_name','mother_problem_desc'], 'string', 'max' => 255],
            [['mother_drug'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'รหัสสถานพยาบาล',
            'cid' => 'เลขที่บัตรประชาชน',
            'pid' => 'HN',
            'hid' => 'Hid',
            'prename' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'hn' => 'เลขทะเบียนบุคคล (HN)',
            'sex' => 'เพศ',
            'birth' => 'วันเกิด',
            'mstatus' => 'Mstatus',
            'occupation_old' => 'Occupation Old',
            'occupation_new' => 'Occupation New',
            'race' => 'Race',
            'nation' => 'Nation',
            'religion' => 'Religion',
            'education' => 'Education',
            'fstatus' => 'Fstatus',
            'father' => 'เลขที่บัตรประชาชนพ่อ',
            'mother' => 'เลขที่บัตรประชาชนแม่',
            'couple' => 'Couple',
            'vstatus' => 'Vstatus',
            'movein' => 'Movein',
            'discharge' => 'Discharge',
            'ddischarge' => 'Ddischarge',
            'abogroup' => 'Abogroup',
            'rhgroup' => 'Rhgroup',
            'labor' => 'Labor',
            'passport' => 'Passport',
            'typearea' => 'Typearea',
            'd_update' => 'D Update',
            'fullName' => 'ชื่อ-นามสกุล',
            'hospitalName' => 'โรงพยาบาล',

            'add_houseno' => 'บ้านเลขที่',
            'add_village' => 'หมู่ที่',
            'add_soimain' => 'ซอย',
            'add_road' => 'ถนน',
            'add_changwat' => 'จังหวัด',
            'add_ampur' => 'อำเภอ',
            'add_tambon' => 'ตำบล',
            'add_zip' => 'รหัสไปรษณีย์',
            'add_mobile' => 'เบอร์โทรศัพท์มือถือ',

            'mother_name' => 'ชื่อ-นามสกุลแม่',
            'father_name' => 'ชื่อ-นามสกุลพ่อ',
            'register_date' => 'วันที่ลงทะเบียน',

            'newborn_at' => 'คลอดที่',
            'newborn_refer_from' => 'รับรีเฟอร์จากสถานพยาบาล',
            'admit_datetime' => 'วันที่ Admit',
            'admit_wardname' => 'ชื่อ Ward',
            'admit_age' => 'อายุ ณ วัน Admit',

            'lr_type' => 'ลักษณะการคลอด',
            'ga' => 'GA',
            'birth_weight' => 'Birth Weight',
            'Height' => 'Height',
            'apgar' => 'Apgar',

            'is_resuscitate' => 'Resuscitate',
            'cpr' => 'CPR',
            'date_of_resuscitate' => 'Date of Resuscitate',
            'ppv' => 'PPV',
            'et_tube' => 'ET-Tube',
            'position_ettube' => 'Position ET-Tube',
            'uvc'=> 'UVC',
            'o2'=> 'จำนวนวันที่รับ O2',
            'day_on_ettube'=> 'จำนวนวันที่ใส่ ET-Tube',

            'mother_age'=> 'อายุ',
            'mother_an'=> 'AN',
            'mother_hn'=> 'HN',
            'mother_vdrl'=>'VDRL',
            'mother_hbsag'=>'HBSAG',
            'mother_anti_hiv'=>'Anti HIV',
            'mother_g'=>'G',
            'mother_p'=>'P',
            'mother_no_of_anc'=>'No. of ANC',
            'mother_congenital_disease' => 'มีโรคประจำตัว',
            'mother_congenital_disease_name' => 'ถ้ามีระบุ',
            'mother_drug' => 'ยาที่กินประจำ',
            'mother_fever'=>'มีไข้',
            'mother_water_break'=>'น้ำเดิน',
            'mother_day_of_water_break'=>'จำนวนชั่วโมง',
            'mother_antibiotic'=>'ได้รับยาปฏิชีวนะ',
            'mother_antibiotic_name'=>'ชื่อยาปฏิชีวนะ',
            'mother_day_of_antibiotic'=>'จำนวนวัน',
            'mother_bloody_show'=>'มีเลือดออกทางช่องคลอด',
            'mother_problem'=>'ปัญหาอื่นๆ',
            'mother_problem_desc'=>'ถ้ามีระบุ',
            'mother_drug_before_born'=>'ได้รับยาก่อนคลอด',
            'mother_drug_before_born_item'=>'ชื่อยาที่ได้รับ',
            'mother_drug_name_before_born'=>'ถ้าได้รับระบุ',
            'mother_drug_before_born_amount'=>'จำนวน (Dose)',
            'mother_amniotic_fluid_type'=>'ลักษณะน้ำคร่ำ',

        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\query\PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
      return new \frontend\modules\nb\models\query\PersonQuery(get_called_class());
    }

    private function getRelationField($relationName,$fieldName,$defaultValue=''){
      return isset($this->{$relationName}) ? $this->{$relationName}->{$fieldName} : $defaultValue;
    }

    public function loadInitAddress($id,$type){
      return Address::find()->loadInit($id,$type)->column();
    }

    public function getFullName(){
      return $this->prename.$this->name.' '.$this->lname;
    }

    public function getHospital()
    {
        return $this->hasOne(Hospital::className(), ['off_id' => 'hospcode']);
    }

    public function getHospitalName()
    {
        return $this->getRelationField('hospital','name');
    }

}
