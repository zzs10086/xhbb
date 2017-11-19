<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%by_money}}".
 *
 * @property integer $id
 * @property double $money
 * @property double $cost
 * @property integer $month
 * @property integer $sort_rank
 */
class ByMoney extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%money}}';
    }

    public static $status_array = [
        1=>'可用',
        2=>'不可以'
    ];

    public static $default_array = [
         0=>'不是',
         1=>'默认'
    ];


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money', 'cost'], 'number'],
            [['month', 'sort_rank','status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'money' => 'Money',
            'cost' => 'Cost',
            'month' => 'Month',
            'sort_rank' => 'Sort Rank',
            'status' => 'Status',
        ];
    }
}
