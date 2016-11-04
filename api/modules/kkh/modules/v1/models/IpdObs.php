<?php

namespace api\modules\kkh\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ipd_obs".
 *
 * @property string $hcode
 * @property string $bhosp
 * @property string $deliver
 * @property string $hn
 * @property string $an
 * @property string $name
 * @property string $husband
 * @property string $mpid
 * @property string $fpid
 * @property string $address
 * @property integer $marital
 * @property integer $sex
 * @property integer $ethnic
 * @property integer $occ
 * @property string $add
 * @property string $admite
 * @property integer $dischart
 * @property string $dischart_date
 * @property string $refer
 * @property string $refer_to
 * @property integer $age
 * @property string $date
 * @property string $lr_date
 * @property string $lr_time
 * @property string $membrane_date
 * @property string $membrane_time
 * @property string $dilate_date
 * @property string $dilate_time
 * @property string $plasenta_date
 * @property string $plasenta_time
 * @property string $plasenta_type
 * @property integer $membrane_type
 * @property integer $amniotic_fluid
 * @property string $hour_stage1
 * @property string $hour_stage2
 * @property string $hour_stage3
 * @property string $hour_lr
 * @property string $hour_membrane
 * @property integer $no
 * @property integer $lrkkh
 * @property integer $extra
 * @property string $para
 * @property string $gravida
 * @property string $lmp
 * @property string $week
 * @property string $weekconfirm
 * @property string $edc
 * @property integer $verify1
 * @property integer $verify2
 * @property integer $verify3
 * @property integer $synto
 * @property integer $bncanyl
 * @property integer $type_birth
 * @property integer $type_point
 * @property integer $fhr
 * @property integer $fhr2
 * @property integer $fhr3
 * @property integer $lhr
 * @property integer $lhr2
 * @property integer $lhr3
 * @property string $episio
 * @property integer $cytotec
 * @property integer $patho_grant
 * @property string $tear
 * @property integer $mode
 * @property string $anc
 * @property string $no_anc
 * @property integer $virtue
 * @property integer $virtue_new
 * @property integer $anc_other
 * @property string $add_anc
 * @property integer $no_anc_other
 * @property integer $no_bth
 * @property string $med_preg
 * @property string $med_preg_des
 * @property string $med_lr
 * @property string $med_lr_des
 * @property string $med_lr_other
 * @property string $med_post
 * @property string $med_post_des
 * @property string $complication_preg
 * @property string $complication_preg_des
 * @property string $complication_lr
 * @property string $complication_lr_des
 * @property string $complication_post
 * @property string $complication_post_des
 * @property integer $mhc
 * @property integer $mbf
 * @property string $blood_gr
 * @property string $rh
 * @property double $hct
 * @property string $hb_typing
 * @property string $hb_of
 * @property string $hb_dcip
 * @property string $vdrl
 * @property string $tpha
 * @property string $hbsag
 * @property string $hbeag
 * @property string $antihiv
 * @property integer $chk_hiv
 * @property integer $chk_hiv_other
 * @property integer $hiv
 * @property string $delivery
 * @property string $suture
 * @property integer $dr
 * @property integer $stat_dsc
 * @property string $date_dsc
 * @property integer $ward_dsc
 * @property string $inp_id
 * @property string $inp_date
 * @property string $time
 * @property integer $chk_dr
 * @property integer $chk_dr_new
 * @property integer $day
 * @property integer $chkpcu
 * @property string $place
 * @property string $remark
 * @property string $lastupdate
 * @property integer $delivery_type
 * @property string $anesthetic
 * @property integer $cord_weight
 * @property double $cord_length
 * @property integer $cord_insertion
 * @property integer $placenta_no
 * @property integer $placenta_membranes_type
 * @property double $blood_loss
 * @property integer $p_after_delivery
 * @property integer $r_after_delivery
 * @property double $bp_after_delivery
 * @property string $complete_chart
 * @property string $attending_physician
 * @property string $approve_by
 */
class IpdObs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipd_obs';
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
            [['hn', 'an', 'name'], 'required'],
            [['marital', 'sex', 'ethnic', 'occ', 'dischart', 'age', 'membrane_type', 'amniotic_fluid', 'no', 'lrkkh', 'extra', 'verify1', 'verify2', 'verify3', 'synto', 'bncanyl', 'type_birth', 'type_point', 'fhr', 'fhr2', 'fhr3', 'lhr', 'lhr2', 'lhr3', 'cytotec', 'patho_grant', 'mode', 'virtue', 'virtue_new', 'anc_other', 'no_anc_other', 'no_bth', 'mhc', 'mbf', 'chk_hiv', 'chk_hiv_other', 'hiv', 'dr', 'stat_dsc', 'ward_dsc', 'chk_dr', 'chk_dr_new', 'day', 'chkpcu', 'delivery_type', 'cord_weight', 'cord_insertion', 'placenta_no', 'placenta_membranes_type', 'p_after_delivery', 'r_after_delivery'], 'integer'],
            [['admite', 'dischart_date', 'date', 'lr_date', 'lr_time', 'membrane_date', 'membrane_time', 'dilate_date', 'dilate_time', 'plasenta_date', 'plasenta_time', 'lmp', 'edc', 'date_dsc', 'inp_date', 'lastupdate'], 'safe'],
            [['med_preg', 'med_preg_des', 'med_lr', 'med_lr_des', 'med_lr_other', 'med_post', 'med_post_des', 'complication_preg_des', 'complication_lr_des', 'complication_post_des', 'remark'], 'string'],
            [['hct', 'cord_length', 'blood_loss', 'bp_after_delivery'], 'number'],
            [['hcode', 'bhosp', 'time'], 'string', 'max' => 5],
            [['deliver', 'hn', 'an', 'plasenta_type', 'gravida', 'week', 'anc', 'no_anc', 'blood_gr', 'rh', 'hb_typing', 'hb_of', 'hb_dcip', 'vdrl', 'tpha', 'hbsag', 'hbeag', 'antihiv', 'suture'], 'string', 'max' => 10],
            [['name', 'husband', 'delivery', 'complete_chart', 'attending_physician', 'approve_by'], 'string', 'max' => 50],
            [['mpid', 'fpid', 'hour_stage1', 'hour_stage2', 'hour_stage3', 'hour_lr', 'hour_membrane'], 'string', 'max' => 20],
            [['address', 'episio', 'complication_preg', 'complication_lr', 'complication_post', 'anesthetic'], 'string', 'max' => 100],
            [['add', 'weekconfirm'], 'string', 'max' => 2],
            [['refer', 'refer_to', 'tear', 'add_anc'], 'string', 'max' => 30],
            [['para'], 'string', 'max' => 4],
            [['inp_id'], 'string', 'max' => 8],
            [['place'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hcode' => 'Hcode',
            'bhosp' => 'Bhosp',
            'deliver' => 'Deliver',
            'hn' => 'Hn',
            'an' => 'An',
            'name' => 'Name',
            'husband' => 'Husband',
            'mpid' => 'Mpid',
            'fpid' => 'Fpid',
            'address' => 'Address',
            'marital' => 'Marital',
            'sex' => 'Sex',
            'ethnic' => 'Ethnic',
            'occ' => 'Occ',
            'add' => 'Add',
            'admite' => 'Admite',
            'dischart' => 'Dischart',
            'dischart_date' => 'Dischart Date',
            'refer' => 'Refer',
            'refer_to' => 'Refer To',
            'age' => 'Age',
            'date' => 'Date',
            'lr_date' => 'Lr Date',
            'lr_time' => 'Lr Time',
            'membrane_date' => 'Membrane Date',
            'membrane_time' => 'Membrane Time',
            'dilate_date' => 'Dilate Date',
            'dilate_time' => 'Dilate Time',
            'plasenta_date' => 'Plasenta Date',
            'plasenta_time' => 'Plasenta Time',
            'plasenta_type' => 'Plasenta Type',
            'membrane_type' => 'Membrane Type',
            'amniotic_fluid' => 'Amniotic Fluid',
            'hour_stage1' => 'Hour Stage1',
            'hour_stage2' => 'Hour Stage2',
            'hour_stage3' => 'Hour Stage3',
            'hour_lr' => 'Hour Lr',
            'hour_membrane' => 'Hour Membrane',
            'no' => 'No',
            'lrkkh' => 'Lrkkh',
            'extra' => 'Extra',
            'para' => 'Para',
            'gravida' => 'Gravida',
            'lmp' => 'Lmp',
            'week' => 'Week',
            'weekconfirm' => 'Weekconfirm',
            'edc' => 'Edc',
            'verify1' => 'Verify1',
            'verify2' => 'Verify2',
            'verify3' => 'Verify3',
            'synto' => 'Synto',
            'bncanyl' => 'Bncanyl',
            'type_birth' => 'Type Birth',
            'type_point' => 'Type Point',
            'fhr' => 'Fhr',
            'fhr2' => 'Fhr2',
            'fhr3' => 'Fhr3',
            'lhr' => 'Lhr',
            'lhr2' => 'Lhr2',
            'lhr3' => 'Lhr3',
            'episio' => 'Episio',
            'cytotec' => 'Cytotec',
            'patho_grant' => 'Patho Grant',
            'tear' => 'Tear',
            'mode' => 'Mode',
            'anc' => 'Anc',
            'no_anc' => 'No Anc',
            'virtue' => 'Virtue',
            'virtue_new' => 'Virtue New',
            'anc_other' => 'Anc Other',
            'add_anc' => 'Add Anc',
            'no_anc_other' => 'No Anc Other',
            'no_bth' => 'No Bth',
            'med_preg' => 'Med Preg',
            'med_preg_des' => 'Med Preg Des',
            'med_lr' => 'Med Lr',
            'med_lr_des' => 'Med Lr Des',
            'med_lr_other' => 'Med Lr Other',
            'med_post' => 'Med Post',
            'med_post_des' => 'Med Post Des',
            'complication_preg' => 'Complication Preg',
            'complication_preg_des' => 'Complication Preg Des',
            'complication_lr' => 'Complication Lr',
            'complication_lr_des' => 'Complication Lr Des',
            'complication_post' => 'Complication Post',
            'complication_post_des' => 'Complication Post Des',
            'mhc' => 'Mhc',
            'mbf' => 'Mbf',
            'blood_gr' => 'Blood Gr',
            'rh' => 'Rh',
            'hct' => 'Hct',
            'hb_typing' => 'Hb Typing',
            'hb_of' => 'Hb Of',
            'hb_dcip' => 'Hb Dcip',
            'vdrl' => 'Vdrl',
            'tpha' => 'Tpha',
            'hbsag' => 'Hbsag',
            'hbeag' => 'Hbeag',
            'antihiv' => 'Antihiv',
            'chk_hiv' => 'Chk Hiv',
            'chk_hiv_other' => 'Chk Hiv Other',
            'hiv' => 'Hiv',
            'delivery' => 'Delivery',
            'suture' => 'Suture',
            'dr' => 'Dr',
            'stat_dsc' => 'Stat Dsc',
            'date_dsc' => 'Date Dsc',
            'ward_dsc' => 'Ward Dsc',
            'inp_id' => 'Inp ID',
            'inp_date' => 'Inp Date',
            'time' => 'Time',
            'chk_dr' => 'Chk Dr',
            'chk_dr_new' => 'Chk Dr New',
            'day' => 'Day',
            'chkpcu' => 'Chkpcu',
            'place' => 'Place',
            'remark' => 'Remark',
            'lastupdate' => 'Lastupdate',
            'delivery_type' => 'Delivery Type',
            'anesthetic' => 'Anesthetic',
            'cord_weight' => 'Cord Weight',
            'cord_length' => 'Cord Length',
            'cord_insertion' => 'Cord Insertion',
            'placenta_no' => 'Placenta No',
            'placenta_membranes_type' => 'Placenta Membranes Type',
            'blood_loss' => 'Blood Loss',
            'p_after_delivery' => 'P After Delivery',
            'r_after_delivery' => 'R After Delivery',
            'bp_after_delivery' => 'Bp After Delivery',
            'complete_chart' => 'Complete Chart',
            'attending_physician' => 'Attending Physician',
            'approve_by' => 'Approve By',
        ];
    }

    /**
     * @inheritdoc
     * @return IpdObsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IpdObsQuery(get_called_class());
    }
}
