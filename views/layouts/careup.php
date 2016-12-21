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

<div class="col s12">
<!-- <div class="col s12"> -->
<!-- <div class="col s12"> -->
   <!--  <div class="header" id="header">
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
                            < echo Html::a('<img class="img-responsive" src="img/Member/Member_7.png" alt="もどる" width="200" height="50" />', ['office/home'], ['class' => '']) ?>
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
    </div> -->
    <!-- Dropdown Structure -->




    <ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>


  <!-- <li class="divider"></li>
  <li><a href="#!">three</a></li> -->
</ul>
    <nav class="blue-text text-darken-2">
        <div class="nav-wrapper nav-header white blue-text text-darken-2">
            <a href="#!" class="brand-logo">
              <img src="img/web-logo.png">   
            </a>

            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down blue-text text-darken-2">
                <li>
                    <!-- <a href="sass.html">Home</a> -->
                    <?php echo Html::a('Home', ['office/home'], ['class' => '']) ?>

                </li>
                 <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown1">
                        <img src="img/friends.png" alt="" width="40" class="circle responsive-img profile-menu-image"> <!-- notice the "circle" class -->
                    </a>
                </li>
                    <!-- <i class="material-icons right">arrow_drop_down</i></a></li> -->
            </ul>

            <ul class="side-nav" id="mobile-demo">
                 <li>
                    <!-- <a href="sass.html">Home</a> -->
                    <?php echo Html::a('Home', ['office/home'], ['class' => '']) ?>

                </li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown1">
                        <img src="img/friends.png" alt="" width="40" class="circle responsive-img profile-menu-image"> <!-- notice the "circle" class -->
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div><!--./col s12-->




<div class="container">
    <!-- <div id="main-page"> -->
    <div id="">
            <!--   Main    -->
        <div class="row">

            <div class="">
                <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>

            <!-- PRE-LOADER -->
            <div class="col s12" id="preloader">
                <div class="preloader-wrapper big active center-align">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div><!--./preloader-wrapper-->
            </div> <!--./col s12-->

            <?= $content ?>
           

        </div> <!-- End row -->
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <div class="white-text">Footer Content</div>
                        <p class="grey-text text-lighten-4">
                            You can add text here
                        </p>
                        
                    </div>
                    <div class="footer-copyright">
                        <div class="container">
                            2016 Copyright text
                            <a href="" class="grey-text text-lighten-4 right">More Links</a>
                        </div>
                    </div>
                </div>
            </div>
         
        </footer>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
