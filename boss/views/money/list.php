<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use common\models\ByMoney as Money;
use yii\helpers\Html;
$this->title = '充值规则列表';

?>
<style>
     .inner a{width: 192px; height: 102px; display: block; }
     .inner p.hk_bs{color: #fff;}
     .inner p{color: #333;}
</style>
<div class="content-wrapper y_content-wrapper">
     <!-- Content Header (Page header) -->

     <section class="content-header l_content-header">
          <h1>充值规则管理
               <small>充值规则列表</small>
          </h1>
     </section>

     <!-- Main content -->
     <section class="content l_leftbox">
          <!-- Main row -->
          <div class="row">
               <form class="form-inline">

                    <div class="col-lg-3 l_tianchong">
                         <div class="form-group">
                              <label for="status">状态</label>
                              <?= Html::dropDownList('status',Yii::$app->request->get('status', ''),Money::$status_array,[
                                   'class'=>'form-control',
                                   'prompt'=>'显示全部'
                              ])?>
                         </div>
                         <!-- Single button -->
                    </div>
                    <div class="col-lg-3 l_tianchong">
                         <div class="form-group">
                              <label for="is_default">默认支付方式</label>
                              <?= Html::dropDownList('is_default',Yii::$app->request->get('is_default', ''),Money::$default_array,[
                                   'class'=>'form-control',
                                   'prompt'=>'显示全部'
                              ])?>
                         </div>
                         <!-- Single button -->
                    </div>

                    <div class="col-lg-3 l_tianchong">
                         <div class="form-group">
                              <button type="submit" class="btn btn-info">搜索</button>
                              <button type="button" class="btn btn-default" onclick="refershUrl()">重置</button>

                         </div>
                    </div>
               </form>

          </div>

          <div class="box l_bottomBox l_topborder">
               <div class="box-header">
                    <h3 class="box-title l_chexichoose">充值规则列表</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                         <div class="row">
                              <div class="col-sm-6"></div>
                              <div class="col-sm-6"></div>
                         </div>
                         <div class="row">
                              <div class="col-sm-12">
                                   <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                          aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="5%"
                                                 aria-label="Rendering engine: activate to sort column descending">ID
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="10%"
                                                 aria-label="Rendering engine: activate to sort column descending">原价(元)
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="10%"
                                                 aria-label="Rendering engine: activate to sort column descending">折扣价（元）
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="10%"
                                                 aria-label="Rendering engine: activate to sort column descending">周期(月)
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="10%"
                                                 aria-label="Rendering engine: activate to sort column descending">状态
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="10%"
                                                 aria-label="Rendering engine: activate to sort column descending">默认付款方式
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="10%"
                                                 aria-label="Rendering engine: activate to sort column descending">付款提示语
                                             </th>
                                             <!--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1"
                                                 width="15%"
                                                 aria-label="CSS grade: activate to sort column ascending">操作
                                             </th>-->

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($moneys as $value) : ?>
                                             <tr role="row" class="odd">
                                                  <td class="sorting_1">
                                                       <?= $value['id'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['money'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['cost'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['month'] == 0 ? '永久' : $value['month'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= Money::$status_array[$value['status']] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= Money::$default_array[$value['is_default']] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['msg'] ?>
                                                  </td>

                                                  <!--<td>
                                                       <a class="btn btn-sm set-to-che btn-warning" href="<?php
/*                                                       echo Url::to('/article/edit?id=' . $value['id']);
                                                       */?>">修改</a>
                                                  </td>-->
                                             </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-7">
                                   <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
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
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- /.box-body -->
          </div>

     </section>
     <!-- /.content -->
</div>
<script>
     function refershUrl()
     {
          var url = document.location.toString();
          var arrUrl = url.split("?");

          var url = arrUrl[0];
          //location.reload(url);
          window.location.href=url;

     }
</script>

