<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_share}}".
 *
 * @property integer $id
 * @property string $openid
 * @property string $url
 * @property integer $addtime
 * @property integer $status
 */
class UserShare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_share}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addtime', 'status'], 'integer'],
            [['openid', 'url'], 'string', 'max' => 50],
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
            'url' => 'Url',
            'addtime' => 'Addtime',
            'status' => 'Status',
        ];
    }
}
