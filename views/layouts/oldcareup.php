<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\CareupAsset;
use app\models\Office;

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

<div class="">
    <div class="navbar-fixed">
        <ul id="dropdown1" class="dropdown-content">
            <li>    
            <!-- <a href="#!">Logout</a> -->
                <?= Html::a( "Logout", $url = ['site/logout'], $options = ['class'=>'','data-method' => 'POST'] ) ?>
            </li>
        </ul>
        <nav>
            <div class="nav-wrapper white">
                <a href="#" data-activates="slide-out" class="mobile-nav-menu-button button-collapse btn-flat">
                    <i class="material-icons">menu</i>
                </a>

                <a href="#!" class="brand-logo hide-on-small-only left"><img src="img/web-logo.png"></a>

                <a href="#!" class="brand-logo hide-on-med-and-up" >
                    <img class="responsive-img" width="150" src="img/web-logo.png">
                    <!-- <img class="responsive-img" width="70" src="img/calogo.png"> -->
                </a>
                <ul class="right hide-on-med-and-down black-text">
                    <li><?php echo Html::a('Search', ['office/search'], ['class' => 'black-text']) ?></li>
                    <li><?php echo Html::a('Home', ['office/index'], ['class' => 'black-text']) ?></li>
                    <li ><a class="black-text" href="#!">Therapist</a></li>
                    <li><a class="black-text" href="#!">Events</a></li>
                    <li><a class="black-text" href="#!">Recruit</a></li>
                    <li><a class="black-text" href="#!">Share</a></li>
                    <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">
                            <img src="img/user_icon.png" alt="" width="40" class="circle responsive-img profile-menu-image">
                            <!-- <i class="material-icons right">arrow_drop_down</i> -->
                        </a>
                    </li>
                </ul>

                <ul class="right hide-on-med-and-up black-text">
                    <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">
                            <img src="img/user_icon.png" alt="" width="40" class="circle responsive-img profile-menu-image">
                            <!-- <i class="material-icons right">arrow_drop_down</i> -->
                        </a>
                    </li>
                </ul>
            </div><!--/.nav-wrapper-->
        </nav>
    </div>
</div><!--/.row-->

<ul id="slide-out" class="side-nav">
    <li>
    <div class="userView">
        <div class="background">
            <!-- <img src="https://lh4.googleusercontent.com/-XplyTa1Za-I/VMSgIyAYkHI/AAAAAAAADxM/oL-rD6VP4ts/w1184-h666/Android-Lollipop-wallpapers-Google-Now-Wallpaper-2.png"> -->

            <?= Html::img('img/side-nav-bg.png', ['alt'=>'Office Image', 'class'=>'','width'=>'']);?>
            <!-- </?= Html::img($model->imgname, ['alt'=>'Office Image', 'class'=>'responsive-img','width'=>'']);?> -->
          
        </div>
        <a href="#!user"></a><?= Html::img('img/user_icon.png', ['alt'=>'Office Image', 'class'=>'responsive-img','width'=>'']);?></a>
        <!-- <a href="#!user"><img class="circle" src="http://materializecss.com/images/yuna.jpg"></a> -->
        <a href="#!name"><span class="white-text name"><?= isset(Yii::$app->user->identity->name)? Yii::$app->user->identity->name:'' ?></span></a>
        <a href="#!email"><span class="white-text email"><?= isset(Yii::$app->user->identity->mailadr)? Yii::$app->user->identity->mailadr:'' ?></span></a>
    </div>
    </li>
    <!-- <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Home</a> </li> -->
    <li>
        <?php echo Html::a('<i class="material-icons">cloud</i>Search', ['office/search'], ['class' => 'waves-effect']) ?>
    </li>
    <li>
        <?php echo Html::a('<i class="material-icons">cloud</i>Offices', ['office/index'], ['class' => 'waves-effect']) ?>
    </li>

   <!--  <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="#!">First</a></li>
            <li><a href="#!">Second</a></li>
            <li><a href="#!">Third</a></li>
            <li><a href="#!">Fourth</a></li>
          </ul>
        </div>
      </li>
    </ul> -->
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Therapist</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Events</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Recruit</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Share</a> </li>
  </ul>




<!-- <div class="row"> -->
    <?= $content ?>
<!-- </div> -->
           

           

<!--     </div>
</div>
 -->
<footer class="page-footer row teal">
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
