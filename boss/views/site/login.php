<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/matrix/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/matrix/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/matrix/css/matrix-login.css" />
    <link href="/matrix/font-awesome/css/font-awesome.css" rel="stylesheet" />


</head>
<body>
<div id="loginbox">
    <?php $form = ActiveForm::begin(['id' => 'login-form','options'=>['class'=>'form-vertical'],'fieldConfig' => [
            'template' => "{label}\n{input}\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1'],
        ],
    ]); ?>
        <div class="control-group normal_text"> <h3><img src="/matrix/img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span><?= $form->field($model, 'username', ['labelOptions'=>['class'=>'']])->textInput(['autofocus' => true])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
            <span class="pull-right">
                 <?= Html::submitButton('登录', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
             </span>
        </div>
    <?php ActiveForm::end(); ?>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
        </div>
    </form>
</div>

<script src="/matrix/js/jquery.min.js"></script>
<script src="/matrix/js/matrix.login.js"></script>
</body>

</html>
<!--
<div class="site-login">
    <h1><?/*= Html::encode($this->title) */?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php /*$form = ActiveForm::begin(['id' => 'login-form']); */?>

                <?/*= $form->field($model, 'username')->textInput(['autofocus' => true]) */?>

                <?/*= $form->field($model, 'password')->passwordInput() */?>

                <?/*= $form->field($model, 'rememberMe')->checkbox() */?>

                <div class="form-group">
                    <?/*= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) */?>
                </div>

            <?php /*ActiveForm::end(); */?>
        </div>
    </div>
</div>
-->