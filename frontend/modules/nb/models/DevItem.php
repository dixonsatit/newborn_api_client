<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "dev_item".
 *
 * @property integer $id
 * @property string $code_item
 * @property string $item_name
 * @property integer $ref
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property DevItemGroup $ref0
 */
class DevItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_dev_item';
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
            [['ref', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['code_item', 'item_name'], 'string', 'max' => 255],
            [['unused'], 'safe'],
            [['ref'], 'exist', 'skipOnError' => true, 'targetClass' => DevItemGroup::className(), 'targetAttribute' => ['ref' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_item' => 'Code Item',
            'item_name' => 'Item Name',
            'ref' => 'Ref',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'unused' => 'Unused'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevItemGroup()
    {
        return $this->hasOne(DevItemGroup::className(), ['id' => 'ref']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitDevelop()
    {
        return $this->hasMany(VisitDevelop::className(), ['develop_no' => 'id']);
    }
}
