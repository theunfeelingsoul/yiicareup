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

<div class="row" id="mynav">
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="#!">three</a></li>
    </ul>
    <div class="navbar-fixed" id="mynav">
        <nav>
            <div class="col s9">
            <div class="nav-wrapper nav-header">
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
            </div>
        </nav>
    </div>
</div><!--./col s12-->





            <?= $content ?>
           

           

    </div>
</div>

<div class="row">
    <div class="s12">
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
