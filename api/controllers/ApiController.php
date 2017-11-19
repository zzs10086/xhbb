<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/31
 * Time: 17:28
 */
namespace api\controllers;
use yii\web\Controller;
use common\models\ByMoney;
use common\models\ByCategory;
use common\models\ByArticle;
use common\models\ByArticlePic;
use common\models\ByUserCollet;
use common\models\ByUser;
use common\models\UserPraise;
use common\models\UserShare;
use Yii;


class ApiController extends BaseController
{
    const READ_COUNT = 30;

    public function actionIndex()
    {
        echo 'test';
    }

    /**
     * vip 价格列表
     */
    public function actionMoney(){

        $data = ByMoney::find()->where(['status' => 1])->asArray()->orderBy('sort_rank desc')->all();

        self::output($data);
    }

    /**
     *
     * 分类
     */
    public function actionGroup(){

        $data = ByCategory::find()->where(['status' => 1])->asArray()->orderBy('sort_rank desc')->all();

        if($data){

            $groupCountArr =[];

            $groupCount = ByArticle::find()->select(['category_id', 'count(id) as num'])->groupBy('category_id')->asArray()->all();

            if($groupCount){
                $groupCountArr = array_column($groupCount, 'num', 'category_id');
            }

            foreach ($data as &$item){
                $item['counts'] = isset($groupCountArr[$item['id']]) ? $groupCountArr[$item['id']] : 0;
            }


        }
        self::output($data);
    }

    /**
     *
     * 分类下的列表
     */
    public function actionList(){

        $cid = Yii::$app->request->get('cid', 0);
        $page = Yii::$app->request->get('page', 1);
        $limit = Yii::$app->request->get('limit', 10);
        $openid = Yii::$app->request->get('openid', '');
        $offset = ($page-1)*$limit;

        if(!$cid) self::output(null,10004);

        if(!$cid){
            self::output(array());
        }

        $data = ByArticle::find()->where(['status' => 1, 'category_id'=>$cid])->offset($offset)->limit($limit)->asArray()->orderBy('id desc')->all();

        $aidArr = array_column($data, 'id'); //文章id
        $praiseAidArr = [];
        //文章id和openid 同时存在
        if($aidArr && $openid){
            $praiseAidArr =  UserPraise::find()->select(['aid'])->where(['openid'=> $openid])->andWhere(['in', 'aid', $aidArr])->asArray()->column();
        }

        if(!empty($data)){
            foreach ($data as &$item){
                $item['ispraise'] = in_array($item['id'], $praiseAidArr) ? 1 : 0;
                $item['addtime'] = date('Y-m-d',$item['addtime']);
                //$item['praise_count'] = $item['praise_count'] + 1024 + $item['id'];
                $item['praise_count'] = $item['praise_count'] + ($item['id']%9) * 111 + $item['id'];
            }
        }

        self::output($data);
    }


    /**
     *
     * 最新的
     */
    public function actionNew(){

        $page = Yii::$app->request->get('page', 1);
        $limit = Yii::$app->request->get('limit', 10);
        $openid = Yii::$app->request->get('openid', '');
        $offset = ($page-1)*$limit;

        $data = ByArticle::find()->where(['status' => 1])->offset($offset)->limit($limit)->asArray()->orderBy('id desc')->all();
        $article = ByArticle::find()->where(['status' => 1])->orderBy('id desc')->one();
        $time1 = new \DateTime(date('Y-m-d',$article->addtime));
        $time2 = new \DateTime(date('Y-m-d',time()));
        $interval = $time2->diff($time1);
        $days_diff = $interval->days;

        if(!empty($data)){

            $aidArr = array_column($data, 'id'); //文章id
            $praiseAidArr = [];

            //文章id和openid 同时存在
            if($aidArr && $openid){

                $praiseAidArr =  UserPraise::find()->select(['aid'])->where(['openid'=> $openid])->andWhere(['in', 'aid', $aidArr])->asArray()->column();

            }

            foreach ($data as &$item){
                $item['ispraise'] = in_array($item['id'], $praiseAidArr) ? 1 : 0;
                $interval = \DateInterval::createFromDateString($days_diff.' day');
                $datetime = new \DateTime(date('Y-m-d',$item['addtime']));
                $datetime->add($interval);
                $item['addtime'] = $datetime->format('Y-m-d');
                //$item['praise_count'] = $item['praise_count'] + 1024 + $item['id'];
                $item['praise_count'] = $item['praise_count'] + ($item['id']%9) * 111 + $item['id'];
            }

        }

        self::output($data);

    }

    /**
     *
     * 文章详情
     */

    public function actionDetail(){
        $openid = Yii::$app->request->get('openid', '');
        $id = Yii::$app->request->get('id', 0);
        if(!$id) self::output(null,10004);
        
        //self::debug_log($openid);

        //文章的信息
        $data = ByArticle::findOne($id)->toArray();
        //文章的多图
        $data['list'] =ByArticlePic::find()->where(['aid'=>$id])->asArray()->orderBy('sort_rank desc')->all();


        //防止分享出去的没有openid
        if($openid){
            $userPraise = new UserPraise();
            $data['ispraise'] = ($userPraise::find()->where(['openid' => $openid, 'aid'=> $id])->exists() ? 1: 0);

            $userCollet = new ByUserCollet();
            $data['iscollet'] = ($userCollet::find()->where(['openid' => $openid, 'aid'=> $id])->exists() ? 1: 0);
            //$data['praise_count'] = $data['praise_count'] + 1024 + $data['id'];
            //阅读次数加1
            $user = ByUser::find()->where(['openid' => $openid])->one();
            if($user){
                $user->read_count += 1;
                $user->save();
            }

        }else{
            $data['ispraise']=0;
            $data['iscollet']=0;

        }
        $data['praise_count'] = $data['praise_count'] + ($data['id']%9) * 111 + $data['id'];
        $data['collet_count'] = $data['collet_count'] + ($data['id']%9) * 51 + ceil($data['id']/3);

        self::output($data);
    }

    /**
     *
     * 用户收藏列表
     */
    public function actionColletlist(){


        $page = Yii::$app->request->get('page', 1);
        $limit = Yii::$app->request->get('limit', 10);
        $offset = ($page-1)*$limit;

        $openid = Yii::$app->request->get('openid', '');
        if(!$openid) self::output(null,10004);

        //$data = ByUserCollet::find()->joinWith(['by_article'])->where(['ByUserCollet.openid' => $openid])->asArray()->all();
        $data = ByUserCollet::find()
            ->select(['b.id','b.title','b.praise_count','b.collet_count','b.is_vip', 'b.addtime', 'b.pic_url'])
            ->alias('a')
            ->leftJoin(ByArticle::tableName() . 'as b', 'a.aid = b.id')
            ->where(['a.openid'=>$openid, 'b.status'=>1])
            ->offset($offset)->limit($limit)
            ->asArray()
            ->orderBy('a.id desc')
            ->all();

        if(!empty($data)){

            $aidArr = array_column($data, 'id'); //文章id
            $praiseAidArr = [];

            //文章id和openid 同时存在
            if($aidArr && $openid){

                $praiseAidArr =  UserPraise::find()->select(['aid'])->where(['openid'=> $openid])->andWhere(['in', 'aid', $aidArr])->asArray()->column();

            }

            foreach ($data as &$item){
                $item['ispraise'] = in_array($item['id'], $praiseAidArr) ? 1 : 0;
                $item['addtime'] = date('Y-m-d',$item['addtime']);
                //$item['praise_count'] = $item['praise_count'] + 1024 + $item['id'];
                $item['praise_count'] = $item['praise_count'] + ($item['id']%9) * 111 + $item['id'];
            }

        }

        self::output($data);
    }

    /**
     * 用户取消收藏
     */
    public function actionUncollet(){
        $openid = Yii::$app->request->get('openid', '');
        $aid = Yii::$app->request->get('aid', 0);

        if(!$openid || !$aid) self::output(null,10004);

        $user = ByUser::find()->where(['openid' => $openid])->asArray()->one();
        if(!$user) self::output(null,10005);


        $userCollet = ByUserCollet::find()->where(['openid' => $openid, 'aid'=> $aid])->one();
        if($userCollet !==null && $userCollet->delete()) {
            self::output();
        }
        self::output(null,10009);

    }
    /**
     *
     * 用户收藏
     */
    public function actionCollet(){

        $openid = Yii::$app->request->get('openid', '');
        $unionid = Yii::$app->request->get('unionid', '');
        $aid = Yii::$app->request->get('aid', 0);

        if(!$openid || !$aid) self::output(null,10004);

        $user = ByUser::find()->where(['openid' => $openid])->asArray()->one();
        if(!$user) self::output(null,10005);

        $userCollet = new ByUserCollet();

        if($userCollet::find()->where(['openid' => $openid, 'aid'=> $aid])->exists()){

            self::output(null,10002);
        }

        $userCollet->user_id = $user['id'];
        $userCollet->aid = $aid;
        $userCollet->openid = $openid;
        $userCollet->unionid = $unionid;
        $userCollet->addtime = time();

        $userCollet->save();

        //文章收藏数加1
        $article = ByArticle::findOne($aid);
        $article->collet_count += 1;
        $article->save();

        self::output(null,10003);

    }

    /**
     *
     * 点赞
     */
    public function actionPraise(){
        $openid = Yii::$app->request->get('openid', '');
        $aid = Yii::$app->request->get('aid', 0);

        if(!$openid || !$aid) self::output(null,10004);

        $user = ByUser::find()->where(['openid' => $openid])->asArray()->one();

        if(!$user) self::output(null,10005);

        $userPraise = new UserPraise();

        if($userPraise::find()->where(['openid' => $openid, 'aid'=> $aid])->exists()){

            self::output(null,10006);
        }

        $userPraise->user_id = $user['id'];
        $userPraise->aid = $aid;
        $userPraise->openid = $openid;
        $userPraise->addtime = time();

        $userPraise->save();

        //文章点赞数加1
        $article = ByArticle::findOne($aid);
        $article->praise_count += 1;
        $article->save();

        self::output(null,10007);


    }

    /**
     *
     * 用户会员信息
     */
    public function actionUserinfo(){

        $openid = Yii::$app->request->get('openid', '');
        if(!$openid) self::output(null,10004);

        $user = ByUser::find()->where(['openid' => $openid])->asArray()->one();

        if(!$user) self::output(null,10005);

        $user['is_view'] = 0; // 0是不可阅读 1是可阅读
        $user['is_expire'] = 0; // 0是已过期 1未过期
        //判断是否可用点击
        if($user['is_forever'] == 1){
            $user['is_view'] = 1;
            self::output($user);
        }

        //过期
        if((strtotime($user['expire_time']) + 84600) < time()){
            $user['is_view'] = 0;
        }else{
            $user['is_view'] = 1;
            $user['is_expire'] = 1;
        }

        if($user['read_count'] < self::READ_COUNT){
            $user['is_view'] = 1;
        }

        self::output($user);
    }

    /**
     *
     * 付款方式
     */
    public function actionPaymode(){
        $openid = Yii::$app->request->get('openid', '');
        if(!$openid) self::output(null,10004);

        //首先查看 分享次数,超过3次则只需0.99元
        $share_count = UserShare::find()->where(['openid' => $openid, 'status'=>0])->count();
        $share_data = ByMoney::find()->where(['id' => 5])->asArray()->one();
        if($share_count >= 3){
            $data = $share_data;
            $data['msg'] = '分享任务完成,'.$data['msg'] ."\n" . "(已分享".$share_count."次)";
        }else{
            $data = ByMoney::find()->where(['is_default' => 1])->asArray()->one();
            $data['msg'] = $data['msg'] ."\n" . $share_data['msg']."\n". "(已分享".$share_count."次)";
        }

        if(!$data) self::output(null,10008);

        self::output($data);

    }

    /**
     *
     * 分享
     */
    public function actionShare(){
        $openid = Yii::$app->request->get('openid', '');
        $url = Yii::$app->request->get('url', '');
        if(!$openid || !$url) self::output(null,10004);

        $userShare = new UserShare();

        $userShare->url = $url;
        $userShare->openid = $openid;
        $userShare->addtime = time();
        $userShare->status = 0;

        $userShare->save();

        self::output(null,10010);

    }



}