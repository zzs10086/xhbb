<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_praise}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $openid
 * @property integer $aid
 * @property integer $addtime
 */
class UserPraise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_praise}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'aid', 'addtime'], 'integer'],
            [['openid'], 'string', 'max' => 50],
            [['openid', 'aid'], 'unique', 'targetAttribute' => ['openid', 'aid'], 'message' => 'The combination of Openid and Aid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'openid' => 'Openid',
            'aid' => 'Aid',
            'addtime' => 'Addtime',
        ];
    }
}
