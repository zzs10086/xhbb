<?php
/**
 * 抓取美女图片
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/30
 * Time: 16:35
 */
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\ByMoney;
use common\models\ByArticle;
use common\models\ByArticlePic;
use common\components\Util;

class BeautyController extends Controller{

    const MAXPAGE = 100;
    //http://www.mm131.com/
    const CATEGORY = [
        1 => ['id'=>6,'url'=>'http://www.mm131.com/xinggan/'],
        2 => '',//'美胸'
        3 => ['id'=>2,'url'=>'http://www.mm131.com/xiaohua/'],
        4 => '',//'翘臀'
        5 => '',//'女神',
        6 => ['id'=>1,'url'=>'http://www.mm131.com/qingchun/'],
        7 => ['id'=>5,'url'=>'http://www.mm131.com/mingxing/'],
        8 => '',//'丝袜',
        9 => ['id'=>4,'url'=>'http://www.mm131.com/qipao/'],
        10 =>['id'=>3,'url'=>'http://www.mm131.com/chemo/'],
    ];

    //http://www.symmz.com/
    const SYMMZ_CATEGORY = [

        1 => 'http://www.symmz.com/xinggan.html',//性感
        2 => 'http://www.symmz.com/meixiong.html',//'美胸'
        3 => 'http://www.symmz.com/xiaohua.html',//校花
        4 => 'http://www.symmz.com/meitun.html',//'翘臀'
        5 => 'http://www.symmz.com/zhainannvshen.html',//'女神',
        6 => 'http://www.symmz.com/qingchun.html',//清纯
        7 => 'http://www.symmz.com/zhifu.html',//制服
        8 => 'http://www.symmz.com/siwa.html',//'丝袜',
        9 => 'http://www.symmz.com/meitui.html',//美腿
        10 =>'http://www.symmz.com/chemo.html',//车模
        11 =>'http://www.symmz.com/qizhi.html',//气质
        12 =>'http://www.symmz.com/xiezhen.html',//写真
    ];

    //http://www.169b.com/
    const MEINV_CATEGORY = [

        /*1 => 'http://www.169b.com/mote/meinvchemo/',//车模
        2 => 'http://www.169b.com/xiongbu/daxiong/',//'美胸'
        3 => 'http://www.169b.com/siwameinv/siwayouhuo/',//丝袜
        4 => 'http://www.169b.com/qunzhuangmeinv/qipaomeinv/',//'旗袍'
        5 => 'http://www.169b.com/gexingmeinv/piaoliang/',//'女神',
        6 => 'http://www.169b.com/gexingmeinv/qingchun/',//清纯
        7 => 'http://www.169b.com/meinvyouhuo/xuesheng/',//制服
        8 => 'http://www.169b.com/meitun/feitunjutun/',//'美臀',
        9 => 'http://www.169b.com/siwameinv/meitui/',//美腿
        10 =>'http://www.169b.com/xingganmeinv/zhongguomeinv/',//性感
        11 =>'http://www.169b.com/gexingmeinv/qizhi/',//气质
        12 =>'http://www.169b.com/qunzhuangmeinv/changqunlifu/',//写真*/

        10=>'http://www.169b.com/xingganmeinv/hanguomeinv/',//性感
    ];

    public function actionGuzzle(){

            foreach (self::MEINV_CATEGORY as $key => $value){

                if($value){
                    $this->guzzle169b($key, $value);
                }

            }

        echo 'end';

    }

    /**
     * 抓取网站是http://www.169b.com/的图片
     * @param $cid
     * @param $url
     * @return bool
     */
    private function guzzle169b($cid, $url){

        if(!$url) return false;

        $maxPage = self::MAXPAGE;

        for ($i=1; $i<$maxPage; $i++){

            $listUrl = ($i > 1? $url . 'list_'.$i.'.html' : $url); //第一页比较特殊
            $listHtml = Util::curl_get_contents($listUrl);

            //页面不存在，返回
            if(strpos($listHtml, '<div class="pic-list">') ==false) return false;

            $listHtml=strstr($listHtml,'<div class="pic-list">');
            $listHtml=strstr($listHtml,'<div class="pages">',true);

            preg_match_all('/<li>[\s\S]*<img[\s\S]*src="([\s\S]+)"[\s\S]*>[\s\S]*<div[\s\S]*class="name"[\s\S]*><a[\s\S]*href="([\s\S]+)"[\s\S]*>([\s\S]+)<\/a>[\s\S]*<\/div>[\s\S]*<\/li>/iU',$listHtml,$match);
            //echo '<pre>';print_r($match);exit;

            if(isset($match[3]) && !empty($match[3])) {

                foreach ($match[3] as $k => $v) {

                    $article = new ByArticle();
                    //是否抓取过
                    if(ByArticle::find()->where(['origin_url' => $match[2][$k]])->exists()) continue;

                    $article->category_id = $cid;
                    $article->origin_url = trim($match[2][$k]);
                    $article->origin_pic_url = trim($match[1][$k]);
                    $article->pic_url = trim($match[1][$k]);
                    $article->addtime = time();
                    $article->title = trim(Util::gb2utf($v));
                    $article->description = trim(Util::gb2utf($v));
                    $article->save();
                    $aid=$article->primaryKey;
                    //抓取详情
                    $this->guzzle169bDetail($aid, $match[2][$k]);

                }
            }

        }
    }

    /**http://www.169b.com/
     * 图片详情
     * @param $aid
     * @param $url
     * @return bool
     */
    private function guzzle169bDetail($aid, $url){

        if(!$url || !$aid) return false;

        for ($i=1; $i<self::MAXPAGE; $i++){

            $detailUrl = ($i > 1 ?  rtrim($url,'.html') . '_'.$i.'.html' : $url); //第一页比较特殊

            $detailHtml = Util::curl_get_contents($detailUrl);
            //页面不存在，返回
            if(strpos($detailHtml, '<div class="big-pic">') ==false) return false;

            $detailHtml=strstr($detailHtml,'<div class="big-pic">');
            $detailHtml=strstr($detailHtml,'<div class="pages">',true);
            preg_match('/<img[\s\S]*src="([\s\S]+)"[\s\S]*>/iU', $detailHtml, $match);
            //echo '<pre>';print_r($match);exit;

            if(isset($match[1]) && !empty($match[1])){
                $pic_url = trim($match[1]);
                $articlePic = new ByArticlePic();
                //是否抓取过
                if(ByArticlePic::find()->where(['origin_pic_url' => $pic_url])->exists()) continue;

                $articlePic->aid = $aid;
                $articlePic->origin_pic_url = $pic_url;
                $articlePic->pic_url = $pic_url;
                $articlePic->sort_rank = $i;
                $articlePic->save();
            }

        }
    }



    /**
     * 抓取网站是http://www.mm131.com/的图片
     *
     * $cid 数据库分类id
     * $oid 源网站分类id
     * $url 抓取的网址
     * 默认最多取100页
     */
    private function guzzleMm131($cid,$oid, $url){

        if(!$url) return false;

        for ($i=1; $i<self::MAXPAGE; $i++){

            //if($i > 1) $listUrl = $url . 'list_'.$oid.'_'.$i.'.html'; //第一页比较特殊
            $listUrl = ($i > 1? $url . 'list_'.$oid.'_'.$i.'.html' : $url); //第一页比较特殊

            $listHtml = Util::curl_get_contents($listUrl);
            //页面不存在，返回
            if(strpos($listHtml, '您访问的页面不存在，请选择其他主题进行浏览') !==false) return false;

            $listHtml=strstr($listHtml,'<div class="main">');
            $listHtml=strstr($listHtml,'<div class="main-right">',true);

            preg_match_all('/<dd>[\s\S]*<a[\s\S]*href="([\s\S]+)"[\s\S]*>[\s\S]*<img[\s\S]*src="([\s\S]+)"[\s\S]*>([\s\S]+)<\/a>[\s\S]*<\/dd>/iU',$listHtml,$match);

            if(isset($match[3]) && !empty($match[3])){

                foreach ($match[3] as $k=>$v){

                    $article = new ByArticle();
                    //是否抓取过
                    if(ByArticle::find()->where(['origin_url' => $match[1][$k]])->exists()) continue;

                    $article->category_id = $cid;
                    $article->origin_url = trim($match[1][$k]);
                    $article->origin_pic_url = trim($match[2][$k]);
                    $article->pic_url = trim($match[2][$k]);
                    $article->addtime = time();
                    $article->title = trim(Util::gb2utf($v));
                    $article->description = trim(Util::gb2utf($v));
                    $article->save();
                    $aid=$article->primaryKey;

                    //抓取详情
                    $this->guzzleMm131Detail($aid, $match[1][$k]);

                    exit;
                }
            }

        }

    }

    private function guzzleMm131Detail($aid, $url){

        if(!$url || !$aid) return false;

        for ($i=1; $i<self::MAXPAGE; $i++){

            $detailUrl = ($i > 1 ?  rtrim($url,'.html') . '_'.$i.'.html' : $url); //第一页比较特殊

            $detailHtml = Util::curl_get_contents($detailUrl);
            //页面不存在，返回
            if(strpos($detailHtml, '您访问的页面不存在，请选择其他主题进行浏览') !==false) return false;

            $detailHtml=strstr($detailHtml,'<div class="content-pic">');
            $detailHtml=strstr($detailHtml,'<div class="content-page">',true);
            preg_match('/<img[\s\S]*src="([\s\S]+)"[\s\S]*>/iU', $detailHtml, $match);

            if(isset($match[1]) && !empty($match[1])){
                $pic_url = trim($match[1]);
                $articlePic = new ByArticlePic();
                //是否抓取过
                if(ByArticlePic::find()->where(['origin_pic_url' => $pic_url])->exists()) continue;

                $articlePic->aid = $aid;
                $articlePic->origin_pic_url = $pic_url;
                $articlePic->pic_url = $pic_url;
                $articlePic->sort_rank = $i;
                $articlePic->save();
            }

        }
    }




}