<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%by_article_pic}}".
 *
 * @property integer $id
 * @property integer $aid
 * @property string $pic_url
 * @property integer $sort_rank
 */
class ByArticlePic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_pic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'sort_rank'], 'integer'],
            [['pic_url', 'origin_pic_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => 'Aid',
            'pic_url' => 'Pic Url',
            'origin_pic_url' => 'Origin Pic Url',
            'sort_rank' => 'Sort Rank',
        ];
    }
}
