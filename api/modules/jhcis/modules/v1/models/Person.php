<?php

namespace api\modules\jhcis\modules\v1\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property string $pcucodeperson
 * @property integer $pid
 * @property integer $hcode
 * @property string $prename
 * @property string $fname
 * @property string $lname
 * @property string $birth
 * @property string $sex
 * @property string $idcard
 * @property string $bloodgroup
 * @property string $bloodrh
 * @property string $allergic
 * @property string $marystatus
 * @property string $educate
 * @property string $occupa
 * @property string $nation
 * @property string $origin
 * @property string $intercode
 * @property string $religion
 * @property integer $familyno
 * @property string $familyposition
 * @property double $income
 * @property string $typelive
 * @property string $datein
 * @property string $dischargetype
 * @property string $dischargedate
 * @property string $father
 * @property string $fatherid
 * @property string $mother
 * @property string $motherid
 * @property string $mate
 * @property string $mateid
 * @property string $privatedoc
 * @property string $rightcode
 * @property string $rightno
 * @property string $hosmain
 * @property string $hossub
 * @property string $dateregis
 * @property string $datestart
 * @property string $dateexpire
 * @property string $officework
 * @property string $hnomoi
 * @property string $roadmoi
 * @property string $mumoi
 * @property string $subdistcodemoi
 * @property string $distcodemoi
 * @property string $provcodemoi
 * @property string $postcodemoi
 * @property string $telephoneperson
 * @property integer $hcodeoldin
 * @property string $dateupdate
 * @property string $flag18fileexpo
 * @property string $messengername
 * @property string $messengeraddr
 * @property string $messengertel
 * @property string $patientrelate
 * @property integer $mommilk
 * @property string $persondisease
 * @property string $flagoffline
 * @property string $nickname
 * @property string $prenameeng
 * @property string $fnameeng
 * @property string $lnameeng
 * @property integer $person_house_position_id_from_hosxp
 * @property string $passpotnumber
 * @property string $workpermitnumber
 * @property string $hidmoi11
 * @property string $housetype
 * @property string $roomno
 * @property string $condo
 * @property string $soisub
 * @property string $soimain
 * @property string $dateupdateaddressout
 * @property string $candobedhomesocial
 * @property string $beastprojectout
 *
 * @property F43specialpp[] $f43specialpps
 * @property Ncdpersonscreenall[] $ncdpersonscreenalls
 * @property Chospital $hossub0
 * @property House $pcucodeperson0
 * @property Ceducation $educate0
 * @property Chospital $hosmain0
 * @property Cnation $nation0
 * @property Coccupa $occupa0
 * @property Cnation $origin0
 * @property Creligion $religion0
 * @property Cright $rightcode0
 * @property Cstatus $marystatus0
 * @property Personaddresscontact $personaddresscontact
 * @property Personalergic[] $personalergics
 * @property Cdrug[] $drugcodes
 * @property Personbehavior $personbehavior
 * @property Personchronic[] $personchronics
 * @property Cdisease[] $chroniccodes
 * @property Personchronicfamily[] $personchronicfamilies
 * @property Personcirclemember[] $personcirclemembers
 * @property Persondeath $persondeath
 * @property Persongrow[] $persongrows
 * @property Personhabit[] $personhabits
 * @property Personstudent $personstudent
 * @property Persontemplemem $persontemplemem
 * @property Persontype[] $persontypes
 * @property Cpersontype[] $typecodes
 * @property Personunable $personunable
 * @property Popdataexam[] $popdataexams
 * @property Visit[] $visits
 * @property Visitancdeliverchild $visitancdeliverchild
 * @property Visitancpregnancy[] $visitancpregnancies
 * @property Visitbabycare[] $visitbabycares
 * @property Visitcataractvolunteer[] $visitcataractvolunteers
 * @property Visitepi[] $visitepis
 * @property Visitfp[] $visitfps
 * @property Visithealthperformance[] $visithealthperformances
 * @property Visitlabblood[] $visitlabbloods
 * @property Visitlabcancer[] $visitlabcancers
 * @property Visitlabchcyhembmsse[] $visitlabchcyhembmsses
 * @property Women $women
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

    public static function primaryKey(){
      return ['pcucodeperson','pid'];
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
            [['pcucodeperson', 'pid', 'hcode', 'fname', 'sex'], 'required'],
            [['pid', 'hcode', 'familyno', 'hcodeoldin', 'mommilk', 'person_house_position_id_from_hosxp'], 'integer'],
            [['birth', 'datein', 'dischargedate', 'dateregis', 'datestart', 'dateexpire', 'dateupdate', 'dateupdateaddressout'], 'safe'],
            [['income'], 'number'],
            [['pcucodeperson', 'postcodemoi'], 'string', 'max' => 5],
            [['prename'], 'string', 'max' => 20],
            [['fname', 'nickname', 'prenameeng'], 'string', 'max' => 25],
            [['lname', 'telephoneperson', 'fnameeng'], 'string', 'max' => 35],
            [['sex', 'bloodrh', 'marystatus', 'familyposition', 'typelive', 'dischargetype', 'flag18fileexpo', 'flagoffline', 'housetype', 'candobedhomesocial', 'beastprojectout'], 'string', 'max' => 1],
            [['idcard', 'fatherid', 'motherid', 'mateid'], 'string', 'max' => 13],
            [['bloodgroup', 'educate', 'intercode', 'religion', 'mumoi', 'subdistcodemoi', 'distcodemoi', 'provcodemoi'], 'string', 'max' => 2],
            [['allergic'], 'string', 'max' => 100],
            [['occupa', 'rightcode'], 'string', 'max' => 4],
            [['nation', 'origin'], 'string', 'max' => 3],
            [['father', 'mother', 'mate'], 'string', 'max' => 257],
            [['privatedoc', 'messengername', 'messengeraddr', 'patientrelate', 'soisub', 'soimain'], 'string', 'max' => 255],
            [['rightno'], 'string', 'max' => 18],
            [['hosmain', 'hossub'], 'string', 'max' => 9],
            [['officework'], 'string', 'max' => 254],
            [['hnomoi', 'condo'], 'string', 'max' => 75],
            [['roadmoi'], 'string', 'max' => 50],
            [['messengertel'], 'string', 'max' => 55],
            [['persondisease'], 'string', 'max' => 350],
            [['lnameeng'], 'string', 'max' => 45],
            [['passpotnumber', 'workpermitnumber'], 'string', 'max' => 37],
            [['hidmoi11'], 'string', 'max' => 11],
            [['roomno'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pcucodeperson' => 'Pcucodeperson',
            'pid' => 'Pid',
            'hcode' => 'Hcode',
            'prename' => 'Prename',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'birth' => 'Birth',
            'sex' => 'Sex',
            'idcard' => 'Idcard',
            'bloodgroup' => 'Bloodgroup',
            'bloodrh' => 'Bloodrh',
            'allergic' => 'Allergic',
            'marystatus' => 'Marystatus',
            'educate' => 'Educate',
            'occupa' => 'Occupa',
            'nation' => 'Nation',
            'origin' => 'Origin',
            'intercode' => 'Intercode',
            'religion' => 'Religion',
            'familyno' => 'Familyno',
            'familyposition' => 'Familyposition',
            'income' => 'Income',
            'typelive' => 'Typelive',
            'datein' => 'Datein',
            'dischargetype' => 'Dischargetype',
            'dischargedate' => 'Dischargedate',
            'father' => 'Father',
            'fatherid' => 'Fatherid',
            'mother' => 'Mother',
            'motherid' => 'Motherid',
            'mate' => 'Mate',
            'mateid' => 'Mateid',
            'privatedoc' => 'Privatedoc',
            'rightcode' => 'Rightcode',
            'rightno' => 'Rightno',
            'hosmain' => 'Hosmain',
            'hossub' => 'Hossub',
            'dateregis' => 'Dateregis',
            'datestart' => 'Datestart',
            'dateexpire' => 'Dateexpire',
            'officework' => 'Officework',
            'hnomoi' => 'Hnomoi',
            'roadmoi' => 'Roadmoi',
            'mumoi' => 'Mumoi',
            'subdistcodemoi' => 'Subdistcodemoi',
            'distcodemoi' => 'Distcodemoi',
            'provcodemoi' => 'Provcodemoi',
            'postcodemoi' => 'Postcodemoi',
            'telephoneperson' => 'Telephoneperson',
            'hcodeoldin' => 'Hcodeoldin',
            'dateupdate' => 'Dateupdate',
            'flag18fileexpo' => 'Flag18fileexpo',
            'messengername' => 'Messengername',
            'messengeraddr' => 'Messengeraddr',
            'messengertel' => 'Messengertel',
            'patientrelate' => 'Patientrelate',
            'mommilk' => 'Mommilk',
            'persondisease' => 'Persondisease',
            'flagoffline' => 'Flagoffline',
            'nickname' => 'Nickname',
            'prenameeng' => 'Prenameeng',
            'fnameeng' => 'Fnameeng',
            'lnameeng' => 'Lnameeng',
            'person_house_position_id_from_hosxp' => 'Person House Position Id From Hosxp',
            'passpotnumber' => 'Passpotnumber',
            'workpermitnumber' => 'Workpermitnumber',
            'hidmoi11' => 'Hidmoi11',
            'housetype' => 'Housetype',
            'roomno' => 'Roomno',
            'condo' => 'Condo',
            'soisub' => 'Soisub',
            'soimain' => 'Soimain',
            'dateupdateaddressout' => 'Dateupdateaddressout',
            'candobedhomesocial' => 'Candobedhomesocial',
            'beastprojectout' => 'Beastprojectout',
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
