<?php
namespace common\models\user;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use dektrium\user\models\User as BaseUser;
/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends BaseUser
{
    /**
     * @inheritdoc
     */
     public static function findIdentityByAccessToken($token, $type = null)
     {
         return static::findOne(['access_token' => $token,'status' => self::STATUS_ACTIVE]);
     }

     /**
     * Generates "access token" authentication key
     */
     public function generateAccessToken()
     {
        $this->access_token = Yii::$app->security->generateRandomString();
     }
}
