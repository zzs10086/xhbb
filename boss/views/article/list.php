<?php

use yii\widgets\LinkPagerAdmin;
use yii\helpers\Url;
use common\models\ByArticle as Article;
use yii\helpers\Html;
$this->title = '图片列表';
$this->params['current_name'] = '图片列表';
?>
<div class="container-fluid">
     <hr>

     <div class="row-fluid">
          <div class="span12">

               <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                         <h5>图片列表</h5>
                         <span class="label label-info">Featured</span> </div>
                    <div class="widget-content ">
                         <table class="table table-bordered table-striped with-check">
                              <thead>
                              <tr>
                                   <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
                                   <th>标题</th>
                                   <th>封面</th>
                                   <th>状态</th>
                                   <th>操作</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($articles as $value) : ?>
                              <tr>
                                   <td><input type="checkbox" /></td>
                                   <td><?= $value['title'] ?></td>
                                   <td><img style="width:50px" src="<?= $value['pic_url'] ?>"></td>
                                   <td><?= Article::$status_array[$value['status']] ?></td>
                                   <td><a class="btn btn-sm set-to-che btn-warning" href="<?php
                                        echo Url::to('/article/edit?id=' . $value['id']);
                                        ?>">修改</a>
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




