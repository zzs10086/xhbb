<?php
use boss\assets\BossAsset;;
use yii\helpers\Html;

$session = \Yii::$app->session;
$base=BossAsset::register($this);
?>

<?php
$this->beginPage();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Html::encode($this->title) ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link type="image/x-icon" href="<?= $base->baseUrl ?>/favicon.ico" rel="shortcut icon">
    <?php $this->head(); ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .y_height {
            background: #eef0f4;
        }
        .main-header>.l_title>.l_text {
            position: absolute;
            bottom: -25px;
            margin-left: 10px;
        }
        .main-header>.l_title>.l_admin {
            font-size: 12px;
            position: absolute;
            top: 29px;
            right: 52px;
        }
        .l_yincang {
            width: 140px;
            position: absolute;
            top: 58px;
            right: 79px;
            z-index: 1000;
        }

    </style>
</head>
<?php $this->beginBody(); ?>
<body class="l_background hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <div class="y_height"></div>
    <header class="main-header">
        <div class="l_title">
            <!--            <img class="l_logo" src="" alt="" />-->
            <span class="l_text" style="top:25px;">
    					<span>小程序</span>
    					<span>•</span>
    					<span>后台</span>
    			</span>
            <span class="l_admin">
    					<span style="cursor: pointer;" class="l_tankuang">
    							<span><?php echo Yii::$app->user->identity->nick_name; ?></span>&nbsp;
    							<img src="<?php echo $base->baseUrl ?>/../img/l_01.png" alt=""/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    					</span>
                <!--    					<span class="l_gonggao"><a href="--><?php //echo \yii\helpers\Url::to(['notice/index']); ?><!--">公告</a></span>-->
    			</span>
            <!--点击系统管理员小弹框-->
            <div class="l_yincang">
                <img src="<?php echo $base->baseUrl ?>/../img/l_02.png"/>
                <ul>
                    <li><a href="<?php echo \yii\helpers\Url::to(['site/logout']); ?>">退出</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['site/index']); ?>">修改信息</a></li>
                </ul>
            </div>
        </div>
        <div class="l_tab">
            <ul>
                <li>
                    <a href="javascript:void(0);">小程序</a>
                </li>
                <div class="clear_float"></div>
            </ul>
        </div>
    </header>


    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar y_main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar" style="height: auto;">
            <ul class="sidebar-menu">
                <li class="treeview active">
                    <a href="javascript:;">
                        <i class="fa fa-car"></i>
                        <span>用户管理</span>
                        <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php /*if ($session->get('shuoadmin_tab_active') == 'account/info'){ echo 'active';  } */?>"><a href="/user/list"><i class="fa fa-circle-o"></i>用户列表</a>
                        </li>
                    </ul>
                </li>
                <!--<li class="treeview active">
                    <a href="javascript:;">
                        <i class="fa fa-car"></i>
                        <span>账号管理</span>
                        <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php /*if ($session->get('shuoadmin_tab_active') == 'account/info'){ echo 'active';  } */?>"><a href="/account/info"><i class="fa fa-circle-o"></i>信息管理</a>
                        </li>
                    </ul>
                </li>-->
                <li class="treeview active ">
                    <a href="javascript:;">
                        <i class="fa fa-newspaper-o"></i>
                        <span>内容管理</span>
                        <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php /*if ($session->get('shuoadmin_tab_active') == 'news/list'){ echo 'active';  } */?>"><a href="/article/list"><i class="fa fa-circle-o"></i>内容列表</a>
                        </li>
                        <!--<li class="<?php /*if ($session->get('shuoadmin_tab_active') == 'news/add'){ echo 'active';  } */?>"><a href="/news/add"><i class="fa fa-circle-o"></i>创建文章</a>
                        </li>-->
                    </ul>
                </li>
                <li class="treeview active">
                    <a href="javascript:;">
                        <i class="fa fa-car"></i>
                        <span>订单管理</span>
                        <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php /*if ($session->get('shuoadmin_tab_active') == 'account/info'){ echo 'active';  } */?>"><a href="/order/list"><i class="fa fa-circle-o"></i>订单列表</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview active">
                    <a href="javascript:;">
                        <i class="fa fa-car"></i>
                        <span>充值规则管理</span>
                        <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php /*if ($session->get('shuoadmin_tab_active') == 'account/info'){ echo 'active';  } */?>"><a href="/money/list"><i class="fa fa-circle-o"></i>充值规则列表</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $content ?>
    </div>
    <!-- /.content-wrapper -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->

    </aside>

</div>

<?php $this->beginBlock('top_taggle'); ?>
$(".l_tankuang").hover(function () {
$(".l_yincang").show();
});
$(".l_yincang").mouseleave(function () {
$(".l_yincang").hide();
});
<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['top_taggle']); ?>
<script>
    function setPassword() {
        layer.open({
            type: 2,
            title: '修改密码',
            maxmin: true,
            shadeClose: true, //点击遮罩关闭层
            area: ['740px', '520px'],
            content: "/index/change-password"
        });
    }
</script>
</body>
<?php $this->endBody(); ?>

</html>
<?php $this->endPage(); ?>


