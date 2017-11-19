<?php
$this->title = '美女图片 - 明星美女写真专辑 高清性感美女图片欣赏';
$this->registerMetaTag(array("name"=>"keywords","content"=>"宝贝,美女,图片,写真,美女图片,美女写真"));
$this->registerMetaTag(array("name"=>"description","content"=>"喜欢宝贝网，收集精美的美女图片，包括明星美女写真图片专辑，大学校花美女贴图，性感车模写真等各类最新最好看的性感美女图片。"));
?>
<div class="index-box">
     <div class="slide">
          <div class="FocusPic">

               <div class="content" id="main-slide" style="width: 745px; height: 340px;">
                    <div class="changeDiv">
                         <?php foreach ($foucs as $k=>$v){?>
                         <a target="_blank" href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>" style="display: none;"><img src="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="745" height="340"></a>
                         <?php } ?>
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

     <div class="title-a mt10"><h2>制服美女</h2></div>
     <div class="pic-list mb7">
          <ul>
               <?php foreach ($zhifu as $k=>$v){?>
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
