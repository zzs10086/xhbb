<?php

namespace common\models;

use Yii;

class ByOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    public static $status_array = [
        1=>'待支付',
        2=>'支付完成'
    ];

    public function getUser()
    {
        return $this->hasOne(\common\models\ByUser::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

        ];
    }
}
