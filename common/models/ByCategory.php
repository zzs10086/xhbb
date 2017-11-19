<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%by_category}}".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $sort_rank
 * @property string $pic_url
 * @property integer $status
 */
class ByCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_rank', 'status'], 'integer'],
            [['category_name'], 'string', 'max' => 30],
            [['pic_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'sort_rank' => 'Sort Rank',
            'pic_url' => 'Pic Url',
            'status' => 'Status',
        ];
    }
}
