<?php

namespace frontend\modules\nb\models;

use Yii;

/**
 * This is the model class for table "lib_items_alias".
 *
 * @property integer $id
 * @property string $group
 * @property string $key
 * @property string $value
 */
class ItemsAlias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_items_alias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['group', 'key'], 'string', 'max' => 255],
            [['group', 'key'], 'unique', 'targetAttribute' => ['group', 'key'], 'message' => 'The combination of Group and Key has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group' => 'Group',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }

    /**
     * @inheritdoc
     * @return ItemsAliasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\modules\nb\models\query\ItemsAliasQuery(get_called_class());
    }

}
