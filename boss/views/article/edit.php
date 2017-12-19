<?php

use yii\helpers\Url;
use common\models\ByArticle as Article;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = '修改内容';
$this->params['current_name'] = '修改内容';
?>

<div class="container-fluid">
     <hr>

     <div class="row-fluid">
          <div class="span12">

               <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                         <h5>图片列表</h5>
                         <span class="label label-info">Featured</span>
                    </div>
                    <div class="widget-content ">
                         <?php $form = ActiveForm::begin([
                              'action' => '',
                              'options' => [
                                   'class' => 'form-horizontal'
                              ]
                         ]); ?>

                         <?= $form->field($model, 'id',['template'=>'{input}{error}'])->hiddenInput()?>
                         <div class="control-group">
                              <?= $form->field($model, 'title',[
                                   'template'=>'{label}<div class="controls">{input}<span class="help-inline">{error}</span></div>'
                              ])->textInput([
                                   'class'=>'form-control',
                                   'maxlength' => 30
                              ])->label('标题',[
                                   'class'=>'control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'category_id',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->dropDownList($catrgory_data,[
                                   'prompt'=>'请选择',
                                   'class'=>'form-control l_form-control input-select2',
                              ])->label('分类',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'is_vip',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->dropDownList(Article::$vip_array,[
                                   'prompt'=>'请选择',
                                   'class'=>'form-control l_form-control input-select2',
                              ])->label('是否VIP',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <label class="col-sm-2 control-label">封面图片：</label>
                              <div class="col-sm-10 col-lg-6">
                                   <div class="controls">
                                        <img class="image-show" style="width:200px;" src="<?= $model->pic_url?>" data-holder-rendered="true" id="img-first">
                                   </div>
                              </div>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'pic_url',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->textInput([
                                   'class'=>'form-control',
                                   'maxlength' => 30
                              ])->label('地址URl',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'praise_count',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->textInput([
                                   'class'=>'form-control',
                                   'maxlength' => 10
                              ])->label('点赞数',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'collet_count',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->textInput([
                                   'class'=>'form-control',
                                   'maxlength' => 10
                              ])->label('收藏数',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'sort_rank',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->textInput([
                                   'class'=>'form-control',
                                   'maxlength' => 10
                              ])->label('排序',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'description',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->textarea([
                                   'rows'=>3,
                                   'class'=>'form-control',
                              ])->label('简介',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>
                         <div class="control-group">
                              <?= $form->field($model, 'status',[
                                   'template'=>'{label}<div class="controls">{input}{error}</div>'
                              ])->dropDownList(Article::$status_array,[
                                   'prompt'=>'请选择',
                                   'class'=>'form-control l_form-control input-select2',
                              ])->label('状态',[
                                   'class'=>'col-sm-2 control-label'
                              ]) ?>
                         </div>

                         <div class="control-group">
                              <div class="col-sm-offset-2 col-sm-10" style="padding-top: 20px;">
                                   <?= Html::submitButton('保存', ['class' => 'btn btn-success', 'id' => 'save']) ?>

                              </div>
                         </div>

                         <?php ActiveForm::end(); ?>

                    </div>
               </div>

          </div>
     </div>
</div>





