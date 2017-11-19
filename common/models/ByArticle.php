<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%by_article}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $pic_url
 * @property integer $addtime
 * @property integer $praise_count
 * @property integer $collet_count
 * @property integer $is_vip
 * @property integer $status
 */
class ByArticle extends \yii\db\ActiveRecord
{

    //状态
    static public $status_array = [
        1=>'可用',
        2=>'不可用'
    ];

    //是否VIP
    static public $vip_array = [
         1=>'是',
         2=>'不是'
    ];




    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                [['addtime'], 'integer','on'=>['default'],'message'=>'{attribute}必须是整数'],
                [['category_id','addtime', 'praise_count', 'collet_count', 'is_vip', 'status'], 'integer','on'=>['default','update'],'message'=>'{attribute}必须是整数'],
                [['title'], 'string', 'max' => 50,'on'=>['default','update'],'message'=>'{attribute}过长'],
                [['description', 'pic_url'], 'string', 'max' => 255,'on'=>['default','update'],'message'=>'{attribute}过长'],
                [['category_id','is_vip','title', 'pic_url','status','sort_rank'], 'required','on'=>['update'],'message'=>'{attribute}不能为空'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => '分类',
            'title' => '标题',
            'description' => '描述',
            'pic_url' => '内容地址',
            'addtime' => '添加时间',
            'praise_count' => '点赞数',
            'collet_count' => '收藏数',
            'is_vip' => '是否是VIP',
            'status' => '状态',
        ];
    }

    public function scenarios()
    {
        $parent_scenarios = parent::scenarios();
        $self_scenarios =  [
             'update' => ['praise_count','collet_count','is_vip','title', 'category_id','description','pic_url','status','sort_rank'],
        ];
        return array_merge($parent_scenarios,$self_scenarios);
    }
}
