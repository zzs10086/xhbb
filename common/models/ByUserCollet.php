<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%by_user_collet}}".
 *
 * @property integer $id
 * @property string $openid
 * @property string $unionid
 * @property integer $aid
 * @property integer $addtime
 */
class ByUserCollet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_collet}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'addtime'], 'integer'],
            [['openid', 'unionid'], 'string', 'max' => 50],
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
            'aid' => 'Aid',
            'addtime' => 'Addtime',
        ];
    }
}
