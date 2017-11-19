<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use common\models\ByUser as User;
use yii\helpers\Html;
use kartik\date\DatePicker;

$this->title = '用户列表';

?>
<style>
     .inner a{width: 192px; height: 102px; display: block; }
     .inner p.hk_bs{color: #fff;}
     .inner p{color: #333;}
</style>
<div class="content-wrapper y_content-wrapper">
     <!-- Content Header (Page header) -->

     <section class="content-header l_content-header">
          <h1>用户管理
               <small>列表</small>
          </h1>
     </section>

     <!-- Main content -->
     <section class="content l_leftbox">
          <!-- Main row -->
          <div class="row">
               <form class="form-inline">

                    <div class="col-lg-3 l_tianchong">
                         <div class="form-group">
                              <label for="openid">openid</label>
                              <input type="text" class="form-control" name="openid"
                                     value="<?= Yii::$app->request->get('openid', '') ?>" placeholder="请输入openid">
                         </div>
                         <!-- Single button -->
                    </div>

                    <div class="col-lg-3 l_tianchong">
                         <div class="form-group">
                              <label for="wx_name">微信名称</label>
                              <input type="text" class="form-control" name="wx_name"
                                     value="<?= Yii::$app->request->get('wx_name', '') ?>" placeholder="请输入微信名称">
                         </div>
                         <!-- Single button -->
                    </div>

                    <div class="col-lg-3 l_tianchong">
                         <div class="form-group">
                              <label for="status">用户类型</label>
                              <?= Html::dropDownList('is_forever',Yii::$app->request->get('is_forever', ''),User::$is_forever_array,[
                                   'class'=>'form-control',
                                   'prompt'=>'显示全部'
                              ])?>
                         </div>
                         <!-- Single button -->
                    </div>
                    <div class="col-lg-3 l_tianchong">
                         <div class="form-group">
                              <label for="expire_time">到期时间</label>
                              <?= DatePicker::widget([
                                   'name' => 'expire_time',
                                   //'type' => DatePicker::TYPE_INPUT,
                                   'pickerButton'=>false,
                                   'readonly' => true,
                                   'options' => [
                                        'placeholder' => '请输入到期时间',
                                        'class'=>'form-control',
                                   ],
                                   'value' => Yii::$app->request->get('expire_time', ''),
                                   'pluginOptions' => [
                                        'class'=>'form-control',
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true,
                                   ]
                                   ]);
                              ?>
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
                    <h3 class="box-title l_chexichoose">用户列表</h3>
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
                                                 aria-label="Rendering engine: activate to sort column descending">openid
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="15%"
                                                 aria-label="Rendering engine: activate to sort column descending">头像
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="15%"
                                                 aria-label="Rendering engine: activate to sort column descending">微信名称
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="15%"
                                                 aria-label="Rendering engine: activate to sort column descending">到期时间
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="15%"
                                                 aria-label="Rendering engine: activate to sort column descending">阅读文章数量
                                             </th>
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1" aria-sort="ascending"
                                                 width="15%"
                                                 aria-label="Rendering engine: activate to sort column descending">用户类型
                                             </th>


                                             <!--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                 colspan="1"
                                                 width="15%"
                                                 aria-label="CSS grade: activate to sort column ascending">操作
                                             </th>-->
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($users as $value) : ?>
                                             <tr role="row" class="odd">
                                                  <td class="sorting_1">
                                                       <?= $value['id'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['openid'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <img style="width:50px" src="<?= $value['head_img'] ?>">
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['wx_name'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['expire_time'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['read_count'] ?>
                                                  </td>
                                                  <td class="sorting_1">
                                                       <?= $value['is_forever']==1 ? '永久VIP' : ($value['expire_time'] == '0000-00-00' ? '非VIP' : (strtotime($value['expire_time']) + 84600 < time() ? '非VIP' : 'VIP')) ?>
                                                  </td>

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

