<?php use yii\helpers\Html;?>
<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">
            <div class="background">
                <!-- <img src="http://materializecss.com/images/office.jpg"> -->


                <?= Html::img($model->imgname, ['alt'=>'Office Image', 'class'=>'responsive-img','width'=>'']);?>
              
            </div>
            <a href="#!user"><img class="circle" src="http://materializecss.com/images/yuna.jpg"></a>
            <a href="#!name"><span class="white-text name"><?= Yii::$app->user->identity->name ?></span></a>
            <a href="#!email"><span class="white-text email"><?= Yii::$app->user->identity->mailadr ?></span></a>
        </div>
    </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Home</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Therapist</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Events</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Recruit</a> </li>
    <li> <a class="waves-effect" href="#!"><i class="material-icons">cloud</i>Share</a> </li>
</ul>