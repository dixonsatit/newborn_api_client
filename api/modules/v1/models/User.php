<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $password_reset_at
 * @property integer $confirmed_email_at
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 * @property UserProfile $userProfile
 * @property UserToken[] $userTokens
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function fields(){
      return [
        'id',
        'username',
        'email',
        'created_at',
        'updated_at',
        'status'
      ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['password_reset_at', 'confirmed_email_at', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'password_reset_at' => 'Password Reset At',
            'confirmed_email_at' => 'Confirmed Email At',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\modules\v1\models\query\UserQuery(get_called_class());
    }

    public static function findMe()
    {
        /** @var \filsh\yii2\oauth2server\Module $module */
        $module = Yii::$app->getModule('oauth2');
        $token = $module->getServer()->getResourceController()->getToken();
        if(!empty($token['user_id']))
        {
            $user =  static::find()
              ->where(['id' => $token['user_id']])
              ->one();
            if($user==null){
              throw new yii\web\NotFoundHttpException('Account not found!.');
            }

            return [
              'username' => $user->username,
              'email' => $user->email,
              'id' => md5($user->id.'^?DixonSatit@gmail.com')
            ];
        }
          else
        {
          return null;
        }
    }
}
