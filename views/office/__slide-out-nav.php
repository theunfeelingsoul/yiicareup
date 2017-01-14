<?php use yii\helpers\Html;?>
<ul id="slide-out" class="side-nav fixed hide-on-med-and-down">
    <li>
        <div class="userView">
            <div class="background">
     


                <?= Html::img('img/side-nav-bg.png', ['alt'=>'Office Image', 'class'=>'responsive-img','width'=>'']);?>
              
            </div>
            <!-- <a href="#!user"><img class="circle" src="http://materializecss.com/images/yuna.jpg"></a> -->
            <a href="#!user"><?= Html::img('img/user_icon.png', ['alt'=>'Office Image', 'class'=>'responsive-img','width'=>'']);?></a>
            <a href="#!name"><span class="white-text name"><?= Yii::$app->user->identity->name ?></span></a>
            <a href="#!email"><span class="white-text email"><?= Yii::$app->user->identity->mailadr ?></span></a>
        </div>
    </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Home</a> </li>
    <ul class="collapsible collapsible-accordion">
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
        </ul>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Therapist</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Events</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Recruit</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Share</a> </li>
</ul>