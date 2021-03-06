<?php use yii\widgets\LinkPager;?>
<?php
$this->title = $title;
$this->registerMetaTag(array("name"=>"keywords","content"=>$keywords));
$this->registerMetaTag(array("name"=>"description","content"=>$description));
$this->params['current'] = $current;
?>
<div class="tj"></div>

<div class="main">
     <div class="listmbx">
          <div class="posit">当前位置：<a href="<?php echo CEnv::HOST_WWW;?>">喜欢宝贝</a> &gt; <a href="<?php echo CEnv::HOST_WWW;?>/<?php echo $category_url;?>"><?php echo $category_name;?></a></div>
     </div>
     <div class="pic-list mb20 list">
          <ul>
               <?php foreach ($list['list'] as $k=>$v){?>
               <li>

                    <div class="picbox"><img data-original="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="235" height="350" src="<?php echo $v['pic_url'];?>" style="display: inline;">
                         <div style="top: 0px;"><b><a target="_blank" href="<?php echo CEnv::HOST_WWW;?>/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"></a></b></div>
                    </div>
                    <div class="name"><a target="_blank" href="<?php echo CEnv::HOST_WWW;?>/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></div>
               </li>
               <?php }?>


          </ul>
     </div>
</div>

<div class="pages">
<?php
echo LinkPager::widget([
     'pagination' => $list['pagination'],
     'firstPageLabel' => '首页',
     'lastPageLabel' => '尾页',
     'nextPageLabel' => '下一页',
     'prevPageLabel' => '上一页',
]);
?>
</div>

<?php
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/jquery.sgallery.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/global.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/jquery.lazyload.min.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
?>