<div class="index-box">
     <div class="slide">
          <div class="FocusPic">

               <div class="content" id="main-slide" style="width: 745px; height: 340px;">
                    <div class="changeDiv">
                         <a target="_blank" href="/mei/qingchun/201707/84825.html" title="皮肤白净内衣女孩" style="display: none;"><img src="http://www.zbjuran.com/uploads/allimg/170725/2-1FH51505410-L.jpg" alt="皮肤白净内衣女孩" width="745" height="340"></a>
                         <a target="_blank" href="/mei/xinggan/201707/84823.html" title="短发美女户外抛胸露香肩写真" style="display: none;"><img src="http://www.zbjuran.com/uploads/allimg/170725/2-1FH5145H00-L.jpg" alt="短发美女户外抛胸露香肩写真" width="745" height="340"></a>
                         <a target="_blank" href="/mei/xinggan/201707/84764.html" title="内衣风情美女床上写真" style="display: none;"><img src="http://www.zbjuran.com/uploads/allimg/170715/2-1FG51531310-L.jpg" alt="内衣风情美女床上写真" width="745" height="340"></a>
                         <a target="_blank" href="/mei/mingxing/201707/84725.html" title="酷似佟丽娅的内衣美女" style="display: none;"><img src="http://www.zbjuran.com/uploads/allimg/170707/2-1FFG63R00-L.jpg" alt="酷似佟丽娅的内衣美女" width="745" height="340"></a>
                         <a target="_blank" href="/mei/xinggan/201706/84707.html" title="这么诱人的九尾cos看了把持不住" style="display: inline;"><img src="http://www.zbjuran.com/uploads/allimg/170707/2-1FFG506440-L.jpg" alt="这么诱人的九尾cos看了把持不住" width="745" height="340"></a>

                    </div>
                    <div class="title-bg" style="width: 745px;"></div>
               </div>

          </div>
     </div>
     <div class="newpic">
          <div class="title-a"> <h2>今日最新</h2></div>
          <ul class="d1">
               <?php foreach ($new as $k=>$v){?>
               <li> <a target="_blank" href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a> </li>
               <?php } ?>
              </ul>
     </div>
</div>


<div class="main">

     <div class="title-a mt10"><h2>性感美女</h2></div>
     <div class="pic-list mb7">
          <ul>
               <?php foreach ($sex as $k=>$v){?>
               <li>
                    <div class="picbox"><img data-original="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="235" height="350" src="<?php echo $v['pic_url'];?>" style="display: inline;">
                         <div style="top: 0px;"><b><a target="_blank" href="/show/<?php echo $v['id'];?>.html"></a></b></div>
                    </div>
                    <div class="name"><a target="_blank" href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></div>
               </li>
               <?php } ?>

          </ul>
     </div>

     <div class="title-a mt10"><h2>丰乳大胸</h2></div>
     <div class="pic-list mb7">
          <ul>
               <?php foreach ($chest as $k=>$v){?>
                    <li>
                         <div class="picbox"><img data-original="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="235" height="350" src="<?php echo $v['pic_url'];?>" style="display: inline;">
                              <div style="top: 0px;"><b><a target="_blank" href="/show/<?php echo $v['id'];?>.html"></a></b></div>
                         </div>
                         <div class="name"><a target="_blank" href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></div>
                    </li>
               <?php } ?>
          </ul>
     </div>

     <div class="title-a mt10"><h2>翘臀美女</h2></div>
     <div class="pic-list mb7">
          <ul>
               <?php foreach ($meitun as $k=>$v){?>
                    <li>
                         <div class="picbox"><img data-original="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="235" height="350" src="<?php echo $v['pic_url'];?>" style="display: inline;">
                              <div style="top: 0px;"><b><a target="_blank" href="/show/<?php echo $v['id'];?>.html"></a></b></div>
                         </div>
                         <div class="name"><a target="_blank" href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></div>
                    </li>
               <?php } ?>
          </ul>
     </div>

     <div class="title-a mt10"><h2>丝袜美女</h2></div>
     <div class="pic-list mb7">
          <ul>
               <?php foreach ($siwai as $k=>$v){?>
                    <li>
                         <div class="picbox"><img data-original="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="235" height="350" src="<?php echo $v['pic_url'];?>" style="display: inline;">
                              <div style="top: 0px;"><b><a target="_blank" href="/show/<?php echo $v['id'];?>.html"></a></b></div>
                         </div>
                         <div class="name"><a target="_blank" href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></div>
                    </li>
               <?php } ?>
          </ul>
     </div>

</div>
<?php
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/jquery.sgallery.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/global.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
Yii::$app->view->registerJsFile(CEnv::STATIC_RESOURCE.'/beauty/js/jquery.lazyload.min.js',['depends'=>['http\assets\AppAsset'],'position'=>\yii\web\View::POS_END]);
?>
<?php $this->beginBlock('jsFoucs') ?>
     $(function(){
          new slide("#main-slide","cur",745,340,1);//焦点图
     })
<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['jsFoucs'], \yii\web\View::POS_END); ?>
