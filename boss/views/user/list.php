<?php

use yii\widgets\LinkPagerAdmin;
use yii\helpers\Url;
use common\models\ByUser as User;
use yii\helpers\Html;
use kartik\date\DatePicker;

$this->title = '用户列表';
$this->params['current_name'] = '用户列表';
?>
<div class="container-fluid">
     <hr>

     <div class="row-fluid">
          <div class="span12">

               <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                         <h5>会员列表</h5>
                         <span class="label label-info">Featured</span>
                    </div>

                    <div class="widget-content">
                              <form class="form-inline">
                              <div class="well">
                                 <label for="user_name">会员名称</label>
                                   <input type="text" class="colorpicker input-big span2" name="user_name" value="<?= Yii::$app->request->get('user_name', '') ?>" placeholder="请输入微信名称">
                                   <label for="status">用户类型</label>
                                   <?= Html::dropDownList('is_forever',Yii::$app->request->get('is_forever', ''),User::$is_forever_array,[
                                        'class'=>'form-control',
                                        'prompt'=>'显示全部'
                                   ])?>
                                   <label for="expire_time">到期时间</label>
                                   <?= DatePicker::widget([
                                        'name' => 'expire_time',
                                        //'type' => DatePicker::TYPE_INPUT,
                                        'pickerButton'=>false,
                                        'readonly' => true,
                                        'options' => [
                                             'placeholder' => '请输入到期时间',
                                             'class'=>'colorpicker input-big span2',
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
                                   <button type="submit" class="btn btn-success">搜索</button>
                              </div>
                              </form>

                             <table class="table table-bordered table-striped with-check">
                              <thead>
                              <tr>
                                   <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
                                   <th>会员名称</th>
                                   <th>头像</th>
                                   <th>vip</th>
                                   <th>状态</th>
                                   <th>操作</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($list as $value) : ?>
                                   <tr>
                                        <td><input type="checkbox" /></td>
                                        <td><?= $value['user_name'] ?></td>
                                        <td><a href="<?= $value['head_img'] ?>" title="点击看大图" target="_blank"><img style="height: 30px;" src="<?= $value['head_img'] ?>"></a></td>
                                        <td><?= $value['is_forever']==1 ? '永久VIP' : ($value['expire_time'] == '0000-00-00' ? '非VIP' : (strtotime($value['expire_time']) + 84600 < time() ? '非VIP' : 'VIP')) ?></td>
                                        <td><?= User::$status_array[$value['status']] ?></td>
                                        <td><a class="btn btn-primary btn-mini" href="<?php
                                             echo Url::to('/article/edit?id=' . $value['id']);
                                             ?>">修改</a>
                                             <a href="<?php echo CEnv::HOST_WWW .'/show/'.$value['id'].'.html';?>" class="btn btn-success btn-mini" target="_blank">预览</a>
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
