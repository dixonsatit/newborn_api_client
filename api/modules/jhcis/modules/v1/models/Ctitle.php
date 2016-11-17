<?php

namespace api\modules\jhcis\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ctitle".
 *
 * @property string $titlecode
 * @property string $titlename
 * @property string $titlenamelong
 * @property string $codemoi
 */
class Ctitle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ctitle';
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
            [['titlecode'], 'required'],
            [['titlecode', 'codemoi'], 'string', 'max' => 3],
            [['titlename'], 'string', 'max' => 70],
            [['titlenamelong'], 'string', 'max' => 130],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'titlecode' => 'Titlecode',
            'titlename' => 'Titlename',
            'titlenamelong' => 'Titlenamelong',
            'codemoi' => 'Codemoi',
        ];
    }

    /**
     * @inheritdoc
     * @return CtitleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CtitleQuery(get_called_class());
    }
}
