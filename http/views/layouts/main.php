<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use http\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
    <div class="hd_w">
        <div class="logo"><a href="http://www.xihuanbaobei.com"><img src="<?php echo \CEnv::STATIC_RESOURCE.'/beauty/images/logo.png';?>" height="48" width="122" alt="喜欢宝贝"></a></div>
        <div class="nav">
            <ul>
                <li><a href="/">首页</a></li>
                <li class="line"></li>
                <li><a href="/xinggan">性感</a></li>
                <li class="line"></li>
                <li><a href="/fengru">丰乳</a></li>
                <li class="line"></li>
                <li><a href="/qiaotun">翘臀</a></li>
                <li class="line"></li>
                <li><a href="/meitui">美腿</a></li>
                <li class="line"></li>
                <li><a href="/nvshen">女神</a></li>
                <li class="line"></li>
                <li><a href="/zhifu">制服</a></li>
                <li class="line"></li>
                <li><a href="/xiezhen">写真</a></li>
                <li class="line"></li>
            </ul>
        </div>
    </div>
</div>

<?= $content ?>
<div class="footer">
    <div class="finner">
        <div class="flogo"></div>
        <div class="fabout">
            <div class="w" style="line-height:90px;">
                ©2017 喜欢宝贝 版权所有<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1263545942'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/stat.php%3Fid%3D1263545942%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
