<?php
$this->title =$data['title']."-喜欢宝贝";
$this->registerMetaTag(array("name"=>"keywords","content"=>$data['title']));
$this->registerMetaTag(array("name"=>"description","content"=>"喜欢宝贝提供性感美女高清图片-".$data['title']."。www.xihuanbaobei.com"));
?>
<div class="main">
     <div class="mbx">当前位置：<a href="/">喜欢宝贝</a> &gt; <a href="/<?php echo $cate['url'];?>"><?php echo $cate['name'];?></a>&gt; <?php echo $data['title'];?></div>
     <div class="pic_box">
          <div class="pic_title"></div>
          <div class="pic_img">
               <center>
                    <?php if($next<=$counts){?>
                    <a href="/show/<?php echo $id."_".$next;?>.html"><img alt="<?php echo $data['title'];?>" src="<?php echo $imgurl;?>"></a>
                    <?php }else{ ?>
                         <img alt="<?php echo $data['title'];?>" src="<?php echo $imgurl;?>">
                    <?php } ?>
               </center>
               <?php if($pre>=1){?><div class="y_left"><a href="/show/<?php echo $id."_".$pre;?>.html"><img src="<?php echo CEnv::STATIC_RESOURCE;?>/beauty/images/y_189.png"></a></div><?php } ?>
               <?php if($next<=$counts){?><div class="y_right"><a href="/show/<?php echo $id."_".$next;?>.html"><img src="<?php echo CEnv::STATIC_RESOURCE;?>/beauty/images/y_190.png"></a></div><?php } ?>
          </div>

     </div>

     <div class="page"><li><a>共<?php echo $counts;?>页: </a></li>
          <?php if($pre>=1){?><li><a href="/show/<?php echo $id."_".$pre;?>.html">上一页</a><?php } ?></li>
          <li class="thisclass">
               <?php for($i=1;$i<=$counts;$i++){ ?>
          <li><a href="/show/<?php echo $id."_".$i;?>.html"><?php echo $i;?></a></li>
          <?php } ?>
              <?php if($next<=$counts){?><li><a href="/show/<?php echo $id."_".$next;?>.html">下一页</a><?php } ?></li><div class="clear"></div>
     </div>
     <div class="clear"></div>
     <div class="handle">
          <?php if($preArticle){?><a href="/show/<?php echo $preArticle['id'];?>.html" class="pre" title="<?php echo $preArticle['title'];?>">上一篇：<?php echo $preArticle['title'];?></a><?php } ?>
          <?php if($nextArticle){?><a href="/show/<?php echo $nextArticle['id'];?>.html" class="next" title="<?php echo $preArticle['title'];?>">下一篇：<?php echo $nextArticle['title'];?></a><?php } ?>
     </div>
     <div class="clear"></div>
     <div class="guess mt20">
          <strong>喜欢<?php echo $data['title'];?>的还喜欢下面的美女图片</strong>
          <ul>
               <?php foreach ($guess as $k=>$v){?>
               <li>
                    <a href="/show/<?php echo $v['id'];?>.html" title="<?php echo $v['title'];?>" target="_blank">
                         <img src="<?php echo $v['pic_url'];?>" alt="<?php echo $v['title'];?>" width="140" height="210">
                         <span><?php echo $v['title'];?></span>
                    </a>
               </li>
               <?php }?>

          </ul>
     </div>
</div>