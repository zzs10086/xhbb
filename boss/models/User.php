<?php

namespace boss\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $authKey;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['nick_name','password'], 'required','message'=>'{attribute}不能为空'],
             [['real_name'] ,'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
             'id' => 'ID',
             'nick_name'=>'登录名称',
             'real_name'=>'真实名称',
             'password'=>'密码'
        ];
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user=self::find()->where(['id'=>$id])->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user=self::find()->where(['access_token'=>$token])->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user=self::find()->where(['nick_name'=>$username])->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
