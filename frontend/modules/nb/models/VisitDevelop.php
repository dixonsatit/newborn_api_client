<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "patient_visit_develop".
 *
 * @property integer $visit_id
 * @property string $age_group
 * @property string $develop_no
 * @property string $lastupdate
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class VisitDevelop extends \yii\db\ActiveRecord
{
    public $groupCode;
    public $groupName;
    public $labelName;
    public $itemCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_visit_develop';
    }

    public function behaviors()
    {
        return [
             TimestampBehavior::className(),
             BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id','age_group','patient_id'], 'required'],
            [['age_group','patient_id','develop_no','visit_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['lastupdate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'age_group' => 'Age Group',
            'develop_no' => 'Develop No',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\query\VisitDevelopQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\modules\nb\models\query\VisitDevelopQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevItems()
    {
        return $this->hasMany(DevItem::className(), ['id' => 'develop_no']);
    }

}
