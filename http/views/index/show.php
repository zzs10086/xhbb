<?php
$this->title = '性感美女,美女写真';
$this->registerMetaTag(array("name"=>"keywords","content"=>"乳神,丰乳肥臀"));
$this->registerMetaTag(array("name"=>"description","content"=>"喜欢宝贝提供性感美女高清图片-".$data['title']."。www.xihuanbaobei.com"));
?>
<div class="main">
     <div class="mbx">当前位置：<a href="/">喜欢宝贝</a> &gt; <a href="/mei/xinggan/">性感美女</a>&gt; <?php echo $data['title'];?></div>
     <div class="pic_box">
          <div class="pic_title"></div>
          <div class="pic_img">
               <center>
                    <img alt="<?php echo $data['title'];?>" src="<?php echo $imgurl;?>">
               </center>
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
                         <span>极品美女胸模孟狐狸秀纹身第二季</span>
                    </a>
               </li>
               <?php }?>

          </ul>
     </div>
</div>