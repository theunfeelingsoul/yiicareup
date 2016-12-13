<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\CareupAsset;

CareupAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="care-up.jp">
    <meta name="keywords" content="care-up.jp">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header" id="header">
    <div class="navbar navbar-default navbar-static-top header">
        <div class="clearfix header-container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" class="navbar-toggle collapsed">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
                    <span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div id="navbar" class="navbar-collapse collapse menu-global">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan">
                        <?php echo Html::a('<img class="img-responsive" src="img/Member/Member_7.png" alt="もどる" width="200" height="50" />', ['office/home'], ['class' => '']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan">
                        <a href="office_whichedit.php"><img class="img-responsive" src="img/Member/Member_1.png" alt="事業所情報登録" width="200" height="50" /></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan text-center">
                        <a href=""><img class="img-responsive" src="img/Member/Member_2.png" alt="スタッフ情報登録" width="200" height="50" /></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan text-center">
                        <a href=""><img class="img-responsive" src="img/Member/Member_3.png" alt="広告作成" width="200" height="50" /></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan text-center">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan text-center">
                        <a href=""><img class="img-responsive" src="img/Member/Member_4.png" alt="事業所情報登録" width="200" height="50" /></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan text-center">
                        <a href=""><img class="img-responsive" src="img/Member/Member_5.png" alt="事業所情報登録" width="200" height="50" /></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 text-center leftspan text-center">
                        <a href=""><img class="img-responsive" src="img/Member/Member_6.png" alt="事業所情報登録" width="200" height="50" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Header  -->
<div id="header"></div>

    <!--   Main    -->
    <div class="container">

   


        <?= $content ?>
   

    </div> <!-- End container -->
<footer class="footer">
 
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
