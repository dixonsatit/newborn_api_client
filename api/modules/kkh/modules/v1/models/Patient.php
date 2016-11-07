<?php

namespace api\modules\kkh\modules\v1\models;

use Yii;
use \api\modules\kkh\modules\v1\models\IpdInf;
/**
 * This is the model class for table "patient".
 *
 * @property integer $ref
 * @property string $hn
 * @property string $title
 * @property string $name
 * @property string $middlename
 * @property string $surname
 * @property string $birth
 * @property integer $age_n
 * @property integer $age_type
 * @property string $age
 * @property string $add
 * @property string $address
 * @property string $moo
 * @property string $soi
 * @property string $road
 * @property string $tambol
 * @property string $amp
 * @property string $prov
 * @property string $tambon
 * @property string $amphur
 * @property string $changwat
 * @property string $zip
 * @property string $tel
 * @property string $add2
 * @property string $address2
 * @property string $moo2
 * @property string $zip2
 * @property integer $sex
 * @property string $education
 * @property integer $marry
 * @property integer $nation
 * @property integer $race
 * @property integer $occupa
 * @property string $type_card
 * @property string $card
 * @property string $no_card
 * @property string $pid
 * @property string $date
 * @property string $father
 * @property string $mother
 * @property integer $ethnic
 * @property string $blood
 * @property string $contr
 * @property string $add_con
 * @property string $st_con
 * @property string $teller
 * @property string $tambon2
 * @property string $amphur2
 * @property string $changwat2
 * @property string $soundex
 * @property string $inp_id
 * @property string $sort
 * @property integer $dep
 * @property string $edit_id
 * @property string $drg_al
 * @property integer $spec_pt
 * @property integer $chk
 * @property integer $pttype
 * @property integer $my_pop
 * @property integer $ischeck
 * @property string $isexpire
 * @property string $scaned
 * @property string $lastupdate
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
            [['hn'], 'required'],
            [['birth', 'date', 'isexpire', 'scaned', 'lastupdate'], 'safe'],
            [['age_n', 'age_type', 'sex', 'marry', 'nation', 'race', 'occupa', 'ethnic', 'dep', 'spec_pt', 'chk', 'pttype', 'my_pop', 'ischeck'], 'integer'],
            [['hn'], 'string', 'max' => 8],
            [['title', 'soi', 'tambol', 'card', 'no_card'], 'string', 'max' => 15],
            [['name', 'middlename', 'surname', 'add_con'], 'string', 'max' => 30],
            [['age', 'prov', 'tambon', 'amphur', 'changwat', 'blood', 'tambon2', 'amphur2', 'changwat2'], 'string', 'max' => 2],
            [['add', 'add2'], 'string', 'max' => 6],
            [['address', 'teller', 'drg_al'], 'string', 'max' => 25],
            [['moo', 'moo2', 'education', 'type_card'], 'string', 'max' => 4],
            [['road', 'amp', 'pid', 'father', 'mother'], 'string', 'max' => 20],
            [['zip'], 'string', 'max' => 5],
            [['tel'], 'string', 'max' => 14],
            [['address2'], 'string', 'max' => 35],
            [['zip2', 'st_con', 'soundex', 'inp_id', 'edit_id'], 'string', 'max' => 10],
            [['contr'], 'string', 'max' => 28],
            [['sort'], 'string', 'max' => 1],
            [['hn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => 'Ref',
            'hn' => 'Hn',
            'title' => 'Title',
            'name' => 'Name',
            'middlename' => 'Middlename',
            'surname' => 'Surname',
            'birth' => 'Birth',
            'age_n' => 'Age N',
            'age_type' => 'Age Type',
            'age' => 'Age',
            'add' => 'Add',
            'address' => 'Address',
            'moo' => 'Moo',
            'soi' => 'Soi',
            'road' => 'Road',
            'tambol' => 'Tambol',
            'amp' => 'Amp',
            'prov' => 'Prov',
            'tambon' => 'Tambon',
            'amphur' => 'Amphur',
            'changwat' => 'Changwat',
            'zip' => 'Zip',
            'tel' => 'Tel',
            'add2' => 'Add2',
            'address2' => 'Address2',
            'moo2' => 'Moo2',
            'zip2' => 'Zip2',
            'sex' => 'Sex',
            'education' => 'Education',
            'marry' => 'Marry',
            'nation' => 'Nation',
            'race' => 'Race',
            'occupa' => 'Occupa',
            'type_card' => 'Type Card',
            'card' => 'Card',
            'no_card' => 'No Card',
            'pid' => 'Pid',
            'date' => 'Date',
            'father' => 'Father',
            'mother' => 'Mother',
            'ethnic' => 'Ethnic',
            'blood' => 'Blood',
            'contr' => 'Contr',
            'add_con' => 'Add Con',
            'st_con' => 'St Con',
            'teller' => 'Teller',
            'tambon2' => 'Tambon2',
            'amphur2' => 'Amphur2',
            'changwat2' => 'Changwat2',
            'soundex' => 'Soundex',
            'inp_id' => 'Inp ID',
            'sort' => 'Sort',
            'dep' => 'Dep',
            'edit_id' => 'Edit ID',
            'drg_al' => 'Drg Al',
            'spec_pt' => 'Spec Pt',
            'chk' => 'Chk',
            'pttype' => 'Pttype',
            'my_pop' => 'My Pop',
            'ischeck' => 'Ischeck',
            'isexpire' => 'Isexpire',
            'scaned' => 'Scaned',
            'lastupdate' => 'Lastupdate',
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

    public function getIpdinf() {
        return $this->hasOne(IpdInf::className(), ['hn' => 'hn']);
    }

    public function getIpdobs() {
         if(isset($this->ipdinf)) {
             if(isset($this->ipdinf->ipdobs)){
                 return $this->ipdinf->ipdobs;
             }
         }
         return null;
    }

    public function extraFields()
    {
        return ['ipdinf','ipdobs'];
    }
}
