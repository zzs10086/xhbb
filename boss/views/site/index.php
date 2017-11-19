<?php

use yii\helpers\Url;
use boss\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '个人信息';
?>

<div class="content-wrapper y_content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>
               个人信息
               <small>修改个人信息</small>
          </h1>
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="box box-info">
               <div class="box-header with-border">
                    <h3 class="box-title">修改个人信息</h3>
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
                         <?= $form->field($model, 'nick_name',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->textInput([
                              'class'=>'form-control',
                              'maxlength' => 30
                         ])->label('登录名称',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'real_name',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->textInput([
                              'class'=>'form-control',
                              'maxlength' => 30
                         ])->label('真实名称',[
                              'class'=>'col-sm-2 control-label'
                         ]) ?>
                    </div>
                    <div class="form-group">
                         <?= $form->field($model, 'password',[
                              'template'=>'{label}<div class="col-sm-10 col-lg-5">{input}{error}</div>'
                         ])->passwordInput([
                              'value'=>'',
                              'class'=>'form-control',
                              'maxlength' => 30
                         ])->label('密码',[
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

