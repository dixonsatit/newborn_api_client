<?php

namespace api\modules\spmedical\modules\v1\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property string $hos_guid
 * @property string $hn
 * @property string $pname
 * @property string $fname
 * @property string $lname
 * @property string $occupation
 * @property string $citizenship
 * @property string $birthday
 * @property string $addrpart
 * @property string $moopart
 * @property string $tmbpart
 * @property string $amppart
 * @property string $chwpart
 * @property string $bloodgrp
 * @property string $clinic
 * @property string $deathday
 * @property string $drugallergy
 * @property integer $familyno
 * @property string $fathername
 * @property string $firstday
 * @property string $hometel
 * @property string $informaddr
 * @property string $informname
 * @property string $informrelation
 * @property string $informtel
 * @property string $marrystatus
 * @property string $mathername
 * @property integer $hn_int
 * @property string $nationality
 * @property string $opdlocation
 * @property string $pttype
 * @property string $religion
 * @property string $sex
 * @property string $spsname
 * @property string $truebirthday
 * @property string $workaddr
 * @property string $worktel
 * @property string $hcode
 * @property string $cid
 * @property integer $hid
 * @property string $educate
 * @property string $family_status
 * @property string $labor_type
 * @property string $last_update
 * @property string $type_area
 * @property string $road
 * @property string $father_cid
 * @property string $mother_cid
 * @property string $couple_cid
 * @property string $person_type
 * @property string $private_doctor_name
 * @property string $legal_action
 * @property string $death_code504
 * @property string $death_diag
 * @property string $node_id
 * @property string $admit
 * @property string $midname
 * @property string $po_code
 * @property string $fatherlname
 * @property string $motherlname
 * @property string $spslname
 * @property string $country
 * @property string $email
 * @property string $birthtime
 * @property string $mother_hn
 * @property string $last_visit
 * @property string $death
 * @property integer $height
 * @property string $inregion
 * @property string $reg_time
 * @property string $oldcode
 * @property string $lang
 * @property string $gov_chronic_id
 * @property string $in_cups
 * @property integer $patient_type_id
 * @property string $addr_soi
 * @property string $work_addr
 * @property string $father_hn
 * @property string $alias_name
 * @property string $destroyed
 * @property string $old_addr
 * @property string $fname_soundex
 * @property string $lname_soundex
 * @property string $bloodgroup_rh
 * @property string $passport_no
 * @property string $addressid
 * @property string $mobile_phone_number
 * @property string $anonymous_person
 * @property string $ec_fname
 * @property string $ec_lname
 * @property integer $hospital_department_id
 * @property string $membercard_no
 * @property integer $ec_relation_type_id
 * @property integer $patient_color_id
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
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
            [['hos_guid'], 'required'],
            [['birthday', 'deathday', 'firstday', 'last_update', 'birthtime', 'last_visit', 'reg_time'], 'safe'],
            [['familyno', 'hn_int', 'hid', 'height', 'patient_type_id', 'hospital_department_id', 'ec_relation_type_id', 'patient_color_id'], 'integer'],
            [['hos_guid'], 'string', 'max' => 38],
            [['hn', 'mother_hn', 'father_hn'], 'string', 'max' => 9],
            [['pname', 'membercard_no'], 'string', 'max' => 15],
            [['fname', 'lname', 'fatherlname', 'motherlname', 'spslname'], 'string', 'max' => 30],
            [['occupation'], 'string', 'max' => 4],
            [['citizenship', 'moopart', 'nationality'], 'string', 'max' => 3],
            [['addrpart', 'fathername', 'informname', 'informrelation', 'mathername', 'opdlocation', 'spsname', 'workaddr', 'road', 'email', 'oldcode', 'fname_soundex', 'lname_soundex', 'ec_fname', 'ec_lname'], 'string', 'max' => 50],
            [['tmbpart', 'amppart', 'chwpart', 'pttype', 'religion', 'person_type', 'death_code504', 'country', 'lang'], 'string', 'max' => 2],
            [['bloodgrp', 'hometel', 'informtel', 'worktel', 'mobile_phone_number'], 'string', 'max' => 20],
            [['clinic', 'addr_soi', 'alias_name'], 'string', 'max' => 100],
            [['drugallergy', 'old_addr'], 'string', 'max' => 250],
            [['informaddr'], 'string', 'max' => 200],
            [['marrystatus', 'sex', 'truebirthday', 'educate', 'family_status', 'labor_type', 'type_area', 'legal_action', 'node_id', 'admit', 'death', 'inregion', 'in_cups', 'destroyed', 'anonymous_person'], 'string', 'max' => 1],
            [['hcode', 'po_code', 'bloodgroup_rh'], 'string', 'max' => 5],
            [['cid', 'father_cid', 'mother_cid', 'couple_cid'], 'string', 'max' => 13],
            [['private_doctor_name'], 'string', 'max' => 75],
            [['death_diag', 'addressid'], 'string', 'max' => 6],
            [['midname', 'passport_no'], 'string', 'max' => 25],
            [['gov_chronic_id'], 'string', 'max' => 10],
            [['work_addr'], 'string', 'max' => 230],
            [['hn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hos_guid' => 'Hos Guid',
            'hn' => 'Hn',
            'pname' => 'Pname',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'occupation' => 'Occupation',
            'citizenship' => 'Citizenship',
            'birthday' => 'Birthday',
            'addrpart' => 'Addrpart',
            'moopart' => 'Moopart',
            'tmbpart' => 'Tmbpart',
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
            'bloodgrp' => 'Bloodgrp',
            'clinic' => 'Clinic',
            'deathday' => 'Deathday',
            'drugallergy' => 'Drugallergy',
            'familyno' => 'Familyno',
            'fathername' => 'Fathername',
            'firstday' => 'Firstday',
            'hometel' => 'Hometel',
            'informaddr' => 'Informaddr',
            'informname' => 'Informname',
            'informrelation' => 'Informrelation',
            'informtel' => 'Informtel',
            'marrystatus' => 'Marrystatus',
            'mathername' => 'Mathername',
            'hn_int' => 'Hn Int',
            'nationality' => 'Nationality',
            'opdlocation' => 'Opdlocation',
            'pttype' => 'Pttype',
            'religion' => 'Religion',
            'sex' => 'Sex',
            'spsname' => 'Spsname',
            'truebirthday' => 'Truebirthday',
            'workaddr' => 'Workaddr',
            'worktel' => 'Worktel',
            'hcode' => 'Hcode',
            'cid' => 'Cid',
            'hid' => 'Hid',
            'educate' => 'Educate',
            'family_status' => 'Family Status',
            'labor_type' => 'Labor Type',
            'last_update' => 'Last Update',
            'type_area' => 'Type Area',
            'road' => 'Road',
            'father_cid' => 'Father Cid',
            'mother_cid' => 'Mother Cid',
            'couple_cid' => 'Couple Cid',
            'person_type' => 'Person Type',
            'private_doctor_name' => 'Private Doctor Name',
            'legal_action' => 'Legal Action',
            'death_code504' => 'Death Code504',
            'death_diag' => 'Death Diag',
            'node_id' => 'Node ID',
            'admit' => 'Admit',
            'midname' => 'Midname',
            'po_code' => 'Po Code',
            'fatherlname' => 'Fatherlname',
            'motherlname' => 'Motherlname',
            'spslname' => 'Spslname',
            'country' => 'Country',
            'email' => 'Email',
            'birthtime' => 'Birthtime',
            'mother_hn' => 'Mother Hn',
            'last_visit' => 'Last Visit',
            'death' => 'Death',
            'height' => 'Height',
            'inregion' => 'Inregion',
            'reg_time' => 'Reg Time',
            'oldcode' => 'Oldcode',
            'lang' => 'Lang',
            'gov_chronic_id' => 'Gov Chronic ID',
            'in_cups' => 'In Cups',
            'patient_type_id' => 'Patient Type ID',
            'addr_soi' => 'Addr Soi',
            'work_addr' => 'Work Addr',
            'father_hn' => 'Father Hn',
            'alias_name' => 'Alias Name',
            'destroyed' => 'Destroyed',
            'old_addr' => 'Old Addr',
            'fname_soundex' => 'Fname Soundex',
            'lname_soundex' => 'Lname Soundex',
            'bloodgroup_rh' => 'Bloodgroup Rh',
            'passport_no' => 'Passport No',
            'addressid' => 'Addressid',
            'mobile_phone_number' => 'Mobile Phone Number',
            'anonymous_person' => 'Anonymous Person',
            'ec_fname' => 'Ec Fname',
            'ec_lname' => 'Ec Lname',
            'hospital_department_id' => 'Hospital Department ID',
            'membercard_no' => 'Membercard No',
            'ec_relation_type_id' => 'Ec Relation Type ID',
            'patient_color_id' => 'Patient Color ID',
        ];
    }

    /**
     * @inheritdoc
     * @return PatientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatientQuery(get_called_class());
    }
}
