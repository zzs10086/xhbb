<?php use yii\widgets\LinkPager;?>
<?php
$this->title = '性感美女,美女写真';
$this->registerMetaTag(array("name"=>"keywords","content"=>"性感美女,美女写真"));
$this->registerMetaTag(array("name"=>"description","content"=>"性感美女,美女写真"));
?>
<div class="tj"></div>

<div class="main">
     <div class="pic-list mb20 list">
          <ul>
               <?php foreach ($list as $k=>$v){?>
               <li>

                    <div class="picbox"><img data-original="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="235" height="350" src="<?php echo $v['pic_url'];?>" style="display: inline;">
                         <div style="top: 0px;"><b><a target="_blank" href="/show/<?php echo $v['id'];?>.html"></a></b></div>
                    </div>
                    <div class="name"><a target="_blank" href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></div>
               </li>
               <?php }?>


          </ul>
     </div>
</div>

<div class="pages">
<?php
echo LinkPager::widget([
     'pagination' => $pagination,
     'firstPageLabel' => '首页',
     'lastPageLabel' => '尾页',
     'nextPageLabel' => '下一页',
     'prevPageLabel' => '上一页',
]);
?>
</div>
<!--<div class="pages">
     <a href="javascript:;">首页</a>
     <a href="javascript:;" class="thisclass">1</a>
     <a href="list_13_2.html">2</a>
     <a href="list_13_3.html">3</a>
     <a href="list_13_4.html">4</a>
     <a href="list_13_5.html">5</a>
     <a href="list_13_6.html">6</a>
     <a href="list_13_7.html">7</a>
     <a href="list_13_8.html">8</a>
     <a href="list_13_9.html">9</a>
     <a href="list_13_10.html">10</a>
     <a href="list_13_11.html">11</a>
     <a href="list_13_2.html">下一页</a>
     <a href="list_13_94.html">末页</a>

</div>-->
<?php
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/jquery.sgallery.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/global.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/jquery.lazyload.min.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
?>