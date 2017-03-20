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

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://careup.jp/">
                <!-- <img alt="Brand" src="..."> -->
                <?= Html::img( 'img/web-logo.png', ['alt'=>'"alt"', 'class'=>'img-responsive','width'=>''] ) ?>
            </a>
        </div>

        <?php if (Yii::$app->controller->action->id == 'signup'): ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="sign-up-login">
                    <?php echo Html::a('<i class=" fa fa-sign-in" aria-hidden="true"></i> Login', ['site/login',], ['class' => '','data-method' => 'post']); ?>
                    
                </li>
                
              </ul>
            </div><!-- /.navbar-collapse -->
        <?php else: ?>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            <?php if (Yii::$app->controller->action->id == 'viewmore'): ?>
                <li class="active">
            <?php else: ?>
                <li>
            <?php endif ?>
            
                    <a href="index.php?r=office/viewmore">
                        <!-- Link <span class="sr-only">(current)</span> -->
                        <div class="nav-menu-link">
                            <span class="pull-left">
                                <?= Html::img( 'img/Member/Member_1_.png', ['alt'=>'"alt"', 'class'=>'img-responsive','width'=>'30'] ) ?>
                            </span>
                            <span class="pull-left"> &nbsp; &nbsp;オフィス</span>
                        </div>
                    </a>
                </li>

            <?php if (Yii::$app->controller->action->id == 'mocksearch'): ?>
                <li class="active">
            <?php else: ?>
                <li>
            <?php endif ?>
                    <a href="index.php?r=office/mocksearch">
                        <!-- Link <span class="sr-only">(current)</span> -->
                        <div class="nav-menu-link">
                            <span class="pull-left">
                                <span class="glyphicon glyphicon-search"></span>
                               
                            </span>
                            <span class="pull-left"> &nbsp; &nbsp;サーチ</span>
                        </div>
                    </a>
                </li>
            </ul>
       
          <ul class="nav navbar-nav navbar-right">
            <li>
                <?php echo Html::a('<div class="nav-menu-link"> <span class="pull-left"> <img src="img/Member/Member_6_.png" width="20" class="img-responsive"> </span> <span class="pull-left"> &nbsp; &nbsp;ログアウト</span> </div>', ['site/logout',], ['class' => '','data-method' => 'post']); ?>
                
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if (isset(Yii::$app->user->identity->name)): ?>
                    
                  <?= Yii::$app->user->identity->name ?> 
                <?php else: ?>
                    No login
                <?php endif ?>
                 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!-- <li><a href="#">Logout</a></li> -->
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
        <?php endif ?>
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <?= $content ?>
</div>
           

           

<!--  Footer  -->
<div class="">
    <div class="footer">
        <div class="section">
            <div class="col-xs-12 col-sm-4 col-md-4" align="center">
                <div class="col_box clearfix">
                    ご利用規約
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4" align="center">
                <div class="col_box clearfix">
                    個人情報保護方針
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4" align="center">
                <div class="col_box clearfix">
                    広告の掲載について
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
