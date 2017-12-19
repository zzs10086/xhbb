<?php

use yii\widgets\LinkPagerAdmin;
use yii\helpers\Url;
use common\models\ByCategory as Category;
use yii\helpers\Html;
$this->title = '分类列表';
$this->params['current_name'] = '分类列表';
?>
<div class="container-fluid">
     <hr>

     <div class="row-fluid">
          <div class="span12">

               <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                         <h5>分类列表</h5>
                         <span class="label label-info">Featured</span> </div>
                    <div class="widget-content ">
                         <table class="table table-bordered table-striped with-check">
                              <thead>
                              <tr>
                                   <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
                                   <th>名称</th>
                                   <th>封面</th>
                                   <th>顺序</th>
                                   <th>状态</th>
                                   <th>操作</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($list as $value) : ?>
                                   <tr>
                                        <td><input type="checkbox" /></td>
                                        <td><?= $value['category_name'] ?></td>
                                        <td><a href="<?= $value['pic_url'] ?>" title="点击看大图" target="_blank"><img style="height: 30px;" src="<?= $value['pic_url'] ?>"></a></td>
                                        <td><?= $value['sort_rank']; ?></td>
                                        <td><?= Category::$status_array[$value['status']] ?></td>
                                        <td><a class="btn btn-primary btn-mini" href="<?php
                                             echo Url::to('/article/categoryedit?id=' . $value['id']);
                                             ?>">修改</a>
                                             <a href="<?php echo CEnv::HOST_WWW .'/'.$value['ename'];?>" class="btn btn-success btn-mini" target="_blank">预览</a>
                                             <a href="javascript:void(0);" class="btn btn-danger btn-mini"  onclick="deleteArticle(<?php /*echo $value['id'] */?>)">删除</a>
                                             <!--<a class="btn btn-sm btn-danger"
                                                          onclick="deleteArticle(<?php /*echo $value['id'] */?>)"
                                                          href="javascript:void(0);">删除</a>-->
                                        </td>
                                   </tr>
                              <?php endforeach; ?>

                              </tbody>
                         </table>

                         <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">
                              <?php
                              echo LinkPagerAdmin::widget([
                                   'pagination' => $pagination,
                                   'firstPageLabel' => '首页',
                                   'lastPageLabel' => '尾页',
                                   'nextPageLabel' => '下一页',
                                   'prevPageLabel' => '上一页',
                                   'pageCssClass'=>'fg-button ui-button ui-state-default',
                                   'disabledListItemSubTagOptions'=>['class' => 'ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default ui-state-disabled'],
                                   'activePageCssClass'=>'ui-state-disabled',
                                   'firstPageCssClass'=>'first fg-button ui-button ui-state-default',
                                   'prevPageCssClass'=>'previous fg-button ui-button ui-state-default',
                                   'nextPageCssClass'=>'next fg-button ui-button ui-state-default',
                                   'lastPageCssClass'=>'last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default',
                              ]);
                              ?>
                         </div>

                    </div>
               </div>

          </div>
     </div>
</div>