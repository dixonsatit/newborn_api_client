<?php

namespace api\modules\kkh\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ipd_inf".
 *
 * @property string $an
 * @property string $hn
 * @property string $an_mat
 * @property integer $lrkkh
 * @property integer $newborn_type
 * @property integer $newborn_no
 * @property integer $delivery_type
 * @property string $delivery_indication
 * @property integer $cs_type
 * @property integer $child_no
 * @property integer $sex
 * @property double $weight
 * @property double $temp
 * @property double $head
 * @property double $length
 * @property integer $type_birth
 * @property integer $con
 * @property string $con_desc
 * @property string $abnormal
 * @property string $abnormalth
 * @property string $birth_injury
 * @property string $illness_preg
 * @property string $illness
 * @property string $illness_delivery
 * @property integer $hr
 * @property integer $autopsy
 * @property integer $early
 * @property string $early_desc
 * @property integer $color1
 * @property integer $color5
 * @property integer $color10
 * @property integer $reflex1
 * @property integer $reflex5
 * @property integer $reflex10
 * @property integer $muscle1
 * @property integer $muscle5
 * @property integer $muscle10
 * @property string $res1
 * @property string $res5
 * @property string $res10
 * @property integer $heart1
 * @property integer $heart5
 * @property integer $heart10
 * @property integer $total1
 * @property integer $total5
 * @property integer $total10
 * @property integer $alrway
 * @property string $mask
 * @property string $ppv1
 * @property string $ppv2
 * @property string $et
 * @property integer $other1
 * @property string $hbv
 * @property string $cother1
 * @property integer $terr
 * @property string $vit
 * @property string $narcan
 * @property string $adre
 * @property string $na
 * @property integer $other2
 * @property string $cother2
 * @property string $nursenote
 * @property integer $stat_dsc
 * @property string $date_dsc
 * @property integer $ward_dsc
 * @property string $time
 * @property double $body
 * @property integer $opacti1
 * @property integer $chkacti1
 * @property integer $chkacti2
 * @property double $dtx1
 * @property double $dtx2
 * @property integer $opacti2
 * @property integer $opacti3
 * @property string $ppcare1
 * @property string $ppcare2
 * @property string $ppcare3
 * @property string $bcare1
 * @property string $bcare2
 * @property string $bcare3
 * @property string $remark
 * @property string $lastupdate
 * @property string $born_time
 * @property string $born_date
 */
class IpdInf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipd_inf';
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
            [['an', 'hn'], 'required'],
            [['lrkkh', 'newborn_type', 'newborn_no', 'delivery_type', 'cs_type', 'child_no', 'sex', 'type_birth', 'con', 'hr', 'autopsy', 'early', 'color1', 'color5', 'color10', 'reflex1', 'reflex5', 'reflex10', 'muscle1', 'muscle5', 'muscle10', 'heart1', 'heart5', 'heart10', 'total1', 'total5', 'total10', 'alrway', 'other1', 'terr', 'other2', 'stat_dsc', 'ward_dsc', 'opacti1', 'chkacti1', 'chkacti2', 'opacti2', 'opacti3'], 'integer'],
            [['weight', 'temp', 'head', 'length', 'body', 'dtx1', 'dtx2'], 'number'],
            [['nursenote', 'remark'], 'string'],
            [['date_dsc', 'ppcare1', 'ppcare2', 'ppcare3', 'bcare1', 'bcare2', 'bcare3', 'lastupdate', 'born_time', 'born_date'], 'safe'],
            [['an', 'hn', 'an_mat'], 'string', 'max' => 10],
            [['delivery_indication', 'abnormal'], 'string', 'max' => 50],
            [['con_desc', 'abnormalth', 'birth_injury', 'illness_preg', 'illness', 'illness_delivery', 'mask', 'ppv1', 'ppv2', 'et', 'hbv', 'vit', 'narcan', 'adre', 'na'], 'string', 'max' => 100],
            [['early_desc', 'cother1', 'cother2'], 'string', 'max' => 30],
            [['res1', 'res5', 'res10', 'time'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'an' => 'An',
            'hn' => 'Hn',
            'an_mat' => 'An Mat',
            'lrkkh' => 'Lrkkh',
            'newborn_type' => 'Newborn Type',
            'newborn_no' => 'Newborn No',
            'delivery_type' => 'Delivery Type',
            'delivery_indication' => 'Delivery Indication',
            'cs_type' => 'Cs Type',
            'child_no' => 'Child No',
            'sex' => 'Sex',
            'weight' => 'Weight',
            'temp' => 'Temp',
            'head' => 'Head',
            'length' => 'Length',
            'type_birth' => 'Type Birth',
            'con' => 'Con',
            'con_desc' => 'Con Desc',
            'abnormal' => 'Abnormal',
            'abnormalth' => 'Abnormalth',
            'birth_injury' => 'Birth Injury',
            'illness_preg' => 'Illness Preg',
            'illness' => 'Illness',
            'illness_delivery' => 'Illness Delivery',
            'hr' => 'Hr',
            'autopsy' => 'Autopsy',
            'early' => 'Early',
            'early_desc' => 'Early Desc',
            'color1' => 'Color1',
            'color5' => 'Color5',
            'color10' => 'Color10',
            'reflex1' => 'Reflex1',
            'reflex5' => 'Reflex5',
            'reflex10' => 'Reflex10',
            'muscle1' => 'Muscle1',
            'muscle5' => 'Muscle5',
            'muscle10' => 'Muscle10',
            'res1' => 'Res1',
            'res5' => 'Res5',
            'res10' => 'Res10',
            'heart1' => 'Heart1',
            'heart5' => 'Heart5',
            'heart10' => 'Heart10',
            'total1' => 'Total1',
            'total5' => 'Total5',
            'total10' => 'Total10',
            'alrway' => 'Alrway',
            'mask' => 'Mask',
            'ppv1' => 'Ppv1',
            'ppv2' => 'Ppv2',
            'et' => 'Et',
            'other1' => 'Other1',
            'hbv' => 'Hbv',
            'cother1' => 'Cother1',
            'terr' => 'Terr',
            'vit' => 'Vit',
            'narcan' => 'Narcan',
            'adre' => 'Adre',
            'na' => 'Na',
            'other2' => 'Other2',
            'cother2' => 'Cother2',
            'nursenote' => 'Nursenote',
            'stat_dsc' => 'Stat Dsc',
            'date_dsc' => 'Date Dsc',
            'ward_dsc' => 'Ward Dsc',
            'time' => 'Time',
            'body' => 'Body',
            'opacti1' => 'Opacti1',
            'chkacti1' => 'Chkacti1',
            'chkacti2' => 'Chkacti2',
            'dtx1' => 'Dtx1',
            'dtx2' => 'Dtx2',
            'opacti2' => 'Opacti2',
            'opacti3' => 'Opacti3',
            'ppcare1' => 'Ppcare1',
            'ppcare2' => 'Ppcare2',
            'ppcare3' => 'Ppcare3',
            'bcare1' => 'Bcare1',
            'bcare2' => 'Bcare2',
            'bcare3' => 'Bcare3',
            'remark' => 'Remark',
            'lastupdate' => 'Lastupdate',
            'born_time' => 'Born Time',
            'born_date' => 'Born Date',
        ];
    }

    /**
     * @inheritdoc
     * @return IpdInfQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IpdInfQuery(get_called_class());
    }
}
