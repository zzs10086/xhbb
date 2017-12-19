<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%by_user}}".
 *
 * @property integer $id
 * @property string $openid
 * @property string $unionid
 * @property string $head_img
 * @property string $wx_name
 * @property string $expire_time
 */
class ByUser extends \yii\db\ActiveRecord
{

    //状态
    public static  $status_array = [
         1=>'可用',
         2=>'不可用'
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public static $is_forever_array = [
        1=>'永久vip',
        2=>'vip',
        3=>'非vip',
    ];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expire_time'], 'safe'],
            [['openid', 'unionid', 'user_name'], 'string', 'max' => 50],
            [['head_img'], 'string', 'max' => 255],
            [['status'], 'integer'],
            [['openid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'unionid' => 'Unionid',
            'head_img' => 'Head Img',
            'user_name' => 'User Name',
            'expire_time' => 'Expire Time',
            'status' => 'Status',
        ];
    }
}
