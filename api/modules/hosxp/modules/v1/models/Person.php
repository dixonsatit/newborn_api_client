<?php

namespace api\modules\hosxp\modules\v1\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $person_id
 * @property integer $house_id
 * @property string $cid
 * @property string $pname
 * @property string $fname
 * @property string $lname
 * @property string $pcode
 * @property string $sex
 * @property string $nationality
 * @property string $citizenship
 * @property string $education
 * @property string $occupation
 * @property string $religion
 * @property string $marrystatus
 * @property integer $house_regist_type_id
 * @property string $birthdate
 * @property string $has_house_regist
 * @property string $chronic_disease_list
 * @property string $club_list
 * @property integer $village_id
 * @property string $blood_group
 * @property integer $current_age
 * @property string $death_date
 * @property string $hos_guid
 * @property integer $income_per_year
 * @property integer $home_position_id
 * @property integer $family_position_id
 * @property string $drug_allergy
 * @property string $last_update
 * @property string $death
 * @property string $pttype
 * @property string $pttype_begin_date
 * @property string $pttype_expire_date
 * @property string $pttype_hospmain
 * @property string $pttype_hospsub
 * @property integer $father_person_id
 * @property integer $mother_person_id
 * @property string $pttype_no
 * @property integer $sps_person_id
 * @property string $birthtime
 * @property integer $age_y
 * @property integer $age_m
 * @property integer $age_d
 * @property integer $family_id
 * @property integer $person_house_position_id
 * @property integer $couple_person_id
 * @property string $person_guid
 * @property string $house_guid
 * @property string $last_update_pttype
 * @property string $patient_link
 * @property string $patient_hn
 * @property string $found_dw_emr
 * @property integer $person_discharge_id
 * @property string $movein_date
 * @property string $discharge_date
 * @property integer $person_labor_type_id
 * @property string $father_name
 * @property string $mother_name
 * @property string $sps_name
 * @property string $father_cid
 * @property string $mother_cid
 * @property string $sps_cid
 * @property string $bloodgroup_rh
 * @property string $home_phone
 * @property string $old_code
 * @property string $deformed_status
 * @property integer $ncd_dm_history_type_id
 * @property integer $ncd_ht_history_type_id
 * @property integer $agriculture_member_type_id
 * @property string $senile
 * @property string $in_region
 * @property double $body_weight_kg
 * @property double $height_cm
 * @property integer $nutrition_level
 * @property integer $height_nutrition_level
 * @property integer $bw_ht_nutrition_level
 * @property string $hometel
 * @property string $worktel
 * @property string $register_conflict
 * @property string $care_person_name
 * @property string $work_addr
 * @property integer $person_dm_screen_status_id
 * @property integer $person_ht_screen_status_id
 * @property integer $person_stroke_screen_status_id
 * @property integer $person_obesity_screen_status_id
 * @property integer $person_dmht_manage_type_id
 * @property integer $last_screen_dmht_bdg_year
 * @property string $dw_chronic_register
 * @property string $mobile_phone
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
            [['person_id', 'house_id', 'pname', 'fname', 'lname'], 'required'],
            [['person_id', 'house_id', 'house_regist_type_id', 'village_id', 'current_age', 'income_per_year', 'home_position_id', 'family_position_id', 'father_person_id', 'mother_person_id', 'sps_person_id', 'age_y', 'age_m', 'age_d', 'family_id', 'person_house_position_id', 'couple_person_id', 'person_discharge_id', 'person_labor_type_id', 'ncd_dm_history_type_id', 'ncd_ht_history_type_id', 'agriculture_member_type_id', 'nutrition_level', 'height_nutrition_level', 'bw_ht_nutrition_level', 'person_dm_screen_status_id', 'person_ht_screen_status_id', 'person_stroke_screen_status_id', 'person_obesity_screen_status_id', 'person_dmht_manage_type_id', 'last_screen_dmht_bdg_year'], 'integer'],
            [['birthdate', 'death_date', 'last_update', 'pttype_begin_date', 'pttype_expire_date', 'birthtime', 'last_update_pttype', 'movein_date', 'discharge_date'], 'safe'],
            [['body_weight_kg', 'height_cm'], 'number'],
            [['cid', 'father_cid', 'mother_cid', 'sps_cid'], 'string', 'max' => 13],
            [['pname'], 'string', 'max' => 25],
            [['fname', 'lname', 'pttype_no', 'old_code', 'care_person_name'], 'string', 'max' => 50],
            [['pcode', 'religion', 'pttype'], 'string', 'max' => 2],
            [['sex', 'education', 'marrystatus', 'has_house_regist', 'death', 'patient_link', 'found_dw_emr', 'deformed_status', 'senile', 'in_region', 'register_conflict', 'dw_chronic_register'], 'string', 'max' => 1],
            [['nationality', 'citizenship'], 'string', 'max' => 3],
            [['occupation'], 'string', 'max' => 4],
            [['chronic_disease_list', 'club_list'], 'string', 'max' => 250],
            [['blood_group', 'hometel', 'worktel', 'mobile_phone'], 'string', 'max' => 20],
            [['hos_guid', 'person_guid', 'house_guid'], 'string', 'max' => 38],
            [['drug_allergy'], 'string', 'max' => 150],
            [['pttype_hospmain', 'pttype_hospsub', 'bloodgroup_rh'], 'string', 'max' => 5],
            [['patient_hn'], 'string', 'max' => 9],
            [['father_name', 'mother_name', 'sps_name', 'work_addr'], 'string', 'max' => 100],
            [['home_phone'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'house_id' => 'House ID',
            'cid' => 'Cid',
            'pname' => 'Pname',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'pcode' => 'Pcode',
            'sex' => 'Sex',
            'nationality' => 'Nationality',
            'citizenship' => 'Citizenship',
            'education' => 'Education',
            'occupation' => 'Occupation',
            'religion' => 'Religion',
            'marrystatus' => 'Marrystatus',
            'house_regist_type_id' => 'House Regist Type ID',
            'birthdate' => 'Birthdate',
            'has_house_regist' => 'Has House Regist',
            'chronic_disease_list' => 'Chronic Disease List',
            'club_list' => 'Club List',
            'village_id' => 'Village ID',
            'blood_group' => 'Blood Group',
            'current_age' => 'Current Age',
            'death_date' => 'Death Date',
            'hos_guid' => 'Hos Guid',
            'income_per_year' => 'Income Per Year',
            'home_position_id' => 'Home Position ID',
            'family_position_id' => 'Family Position ID',
            'drug_allergy' => 'Drug Allergy',
            'last_update' => 'Last Update',
            'death' => 'Death',
            'pttype' => 'Pttype',
            'pttype_begin_date' => 'Pttype Begin Date',
            'pttype_expire_date' => 'Pttype Expire Date',
            'pttype_hospmain' => 'Pttype Hospmain',
            'pttype_hospsub' => 'Pttype Hospsub',
            'father_person_id' => 'Father Person ID',
            'mother_person_id' => 'Mother Person ID',
            'pttype_no' => 'Pttype No',
            'sps_person_id' => 'Sps Person ID',
            'birthtime' => 'Birthtime',
            'age_y' => 'Age Y',
            'age_m' => 'Age M',
            'age_d' => 'Age D',
            'family_id' => 'Family ID',
            'person_house_position_id' => 'Person House Position ID',
            'couple_person_id' => 'Couple Person ID',
            'person_guid' => 'Person Guid',
            'house_guid' => 'House Guid',
            'last_update_pttype' => 'Last Update Pttype',
            'patient_link' => 'Patient Link',
            'patient_hn' => 'Patient Hn',
            'found_dw_emr' => 'Found Dw Emr',
            'person_discharge_id' => 'Person Discharge ID',
            'movein_date' => 'Movein Date',
            'discharge_date' => 'Discharge Date',
            'person_labor_type_id' => 'Person Labor Type ID',
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'sps_name' => 'Sps Name',
            'father_cid' => 'Father Cid',
            'mother_cid' => 'Mother Cid',
            'sps_cid' => 'Sps Cid',
            'bloodgroup_rh' => 'Bloodgroup Rh',
            'home_phone' => 'Home Phone',
            'old_code' => 'Old Code',
            'deformed_status' => 'Deformed Status',
            'ncd_dm_history_type_id' => 'Ncd Dm History Type ID',
            'ncd_ht_history_type_id' => 'Ncd Ht History Type ID',
            'agriculture_member_type_id' => 'Agriculture Member Type ID',
            'senile' => 'Senile',
            'in_region' => 'In Region',
            'body_weight_kg' => 'Body Weight Kg',
            'height_cm' => 'Height Cm',
            'nutrition_level' => 'Nutrition Level',
            'height_nutrition_level' => 'Height Nutrition Level',
            'bw_ht_nutrition_level' => 'Bw Ht Nutrition Level',
            'hometel' => 'Hometel',
            'worktel' => 'Worktel',
            'register_conflict' => 'Register Conflict',
            'care_person_name' => 'Care Person Name',
            'work_addr' => 'Work Addr',
            'person_dm_screen_status_id' => 'Person Dm Screen Status ID',
            'person_ht_screen_status_id' => 'Person Ht Screen Status ID',
            'person_stroke_screen_status_id' => 'Person Stroke Screen Status ID',
            'person_obesity_screen_status_id' => 'Person Obesity Screen Status ID',
            'person_dmht_manage_type_id' => 'Person Dmht Manage Type ID',
            'last_screen_dmht_bdg_year' => 'Last Screen Dmht Bdg Year',
            'dw_chronic_register' => 'Dw Chronic Register',
            'mobile_phone' => 'Mobile Phone',
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
}
