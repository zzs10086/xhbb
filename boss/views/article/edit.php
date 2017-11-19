<?php

use yii\helpers\Url;
use common\models\ByArticle as Article;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = '修改内容';

?>
<div class="content-wrapper y_content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>
               新闻管理
               <small>修改内容</small>
          </h1>
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="box box-info">
               <div class="box-header with-border">
                    <h3 class="box-title">修改内容</h3>
               </div>
               <div class="box-body">
                    <?php $form = ActiveForm::begin([
                         'action' => '',
                         'options' => [
                              'class' => 'form-horizontal'
                         ]
                    ]); ?>

                    <?= $form->field($model, 'id',['template'=>'{input}{error}'])->hiddenInput()?>
                    <div class="form-group">
                         <?= $form->field($model, 'title',[
                                   'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                              ])->textInput([
                                   'class'=>'form-control',
                                   'maxlength' => 30
                              ])->label('标题',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'category_id',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->dropDownList($catrgory_data,[
                              'prompt'=>'请选择',
                              'class'=>'form-control l_form-control input-select2',
                         ])->label('分类',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'is_vip',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->dropDownList(Article::$vip_array,[
                              'prompt'=>'请选择',
                              'class'=>'form-control l_form-control input-select2',
                         ])->label('是否VIP',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-2 control-label">封面图片：</label>
                         <div class="col-sm-10 col-lg-6">
                              <div class="thumbnail l_thumbnail col-lg-5 col-sm-5 fileupload-buttonbar">
                                   <img class="image-show" style="width:200px;"
                                        src="<?= $model->pic_url?>" data-holder-rendered="true" id="img-first">
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'pic_url',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->textInput([
                              'class'=>'form-control',
                              'maxlength' => 30
                         ])->label('地址URl',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'praise_count',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->textInput([
                              'class'=>'form-control',
                              'maxlength' => 10
                         ])->label('点赞数',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                              <?= $form->field($model, 'collet_count',[
                                   'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                              ])->textInput([
                                   'class'=>'form-control',
                                   'maxlength' => 10
                              ])->label('收藏数',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'sort_rank',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->textInput([
                              'class'=>'form-control',
                              'maxlength' => 10
                         ])->label('排序',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'description',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->textarea([
                              'rows'=>3,
                              'class'=>'form-control',
                         ])->label('简介',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'status',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->dropDownList(Article::$status_array,[
                              'prompt'=>'请选择',
                              'class'=>'form-control l_form-control input-select2',
                         ])->label('状态',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>

                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10" style="padding-top: 20px;">
                              <?= Html::submitButton('保存', ['class' => 'btn btn-warning', 'id' => 'save']) ?>

                         </div>
                    </div>
               </div>
               <?php ActiveForm::end(); ?>
          </div>

     </section>
     <!-- /.content -->
</div>

