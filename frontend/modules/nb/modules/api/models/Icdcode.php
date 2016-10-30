<?php

namespace frontend\modules\nb\modules\api\models;

use Yii;

/**
 * This is the model class for table "icdcode".
 *
 * @property integer $id
 * @property string $code
 * @property string $description
 * @property string $type
 * @property integer $status
 */
class Icdcode extends \yii\db\ActiveRecord
{
  const TYPE_ICD10 = 'icd10';
  const TYPE_ICD9 = 'icd9';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icdcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'description'], 'required'],
            [['description', 'type'], 'string'],
            [['status'], 'integer'],
            [['code'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'description' => 'Description',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return IcdcodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IcdcodeQuery(get_called_class());
    }
}
