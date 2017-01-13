<?php use yii\helpers\Html;?>
<ul id="slide-out" class="side-nav fixed hide-on-med-and-down">
    <li>
        <div class="userView">
            <div class="background">
                <img src="https://lh4.googleusercontent.com/-XplyTa1Za-I/VMSgIyAYkHI/AAAAAAAADxM/oL-rD6VP4ts/w1184-h666/Android-Lollipop-wallpapers-Google-Now-Wallpaper-2.png">


                <!-- </?= Html::img($model->imgname, ['alt'=>'Office Image', 'class'=>'responsive-img','width'=>'']);?> -->
              
            </div>
            <a href="#!user"><img class="circle" src="http://materializecss.com/images/yuna.jpg"></a>
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