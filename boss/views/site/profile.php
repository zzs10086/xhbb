<?php

use yii\helpers\Url;
use boss\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '管理后台-账户信息';
$this->params['current_name'] = '账户信息';
?>

<div class="container-fluid">
    <hr>

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                    <h5>账户信息</h5>
                </div>
                <div class="widget-content">

                    <?php $form = ActiveForm::begin([
                        'action' => '',
                        'options' => [
                            'class' => 'form-horizontal'
                        ],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"controls\">{input}</div>\n<span class=\"help-inline\">{error}</span>",
                            'labelOptions' => ['class' => 'control-label'],
                        ]
                    ]); ?>

                    <?= $form->field($model, 'id',['template'=>'{input}{error}'])->hiddenInput()?>
                    <div class="form-group">
                        <?= $form->field($model, 'nick_name')->textInput([
                            'class'=>'form-control',
                            'maxlength' => 30
                        ])->label('登录名称',[
                            'class'=>'control-label'
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'real_name')->textInput([
                            'class'=>'form-control',
                            'maxlength' => 30
                        ])->label('真实名称') ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'password')->passwordInput([
                            'class'=>'form-control',
                            'maxlength' => 30
                        ])->label('密码') ?>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="padding-top: 20px;">
                            <?= Html::submitButton('保存', ['class' => 'btn btn-success', 'id' => 'save']) ?>

                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>


</div>

