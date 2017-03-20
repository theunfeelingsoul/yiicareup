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

    <li>
        <?php echo Html::a(Html::img('@web/img/find/6.png'), ['office/search'], ['class' => 'waves-effect']) ?>
    </li>
    <li>
        <?php echo Html::a(Html::img('@web/img/Member/Member_1.png'), ['office/index'], ['class' => 'waves-effect']) ?>
    </li>
    <li>
        <?php echo Html::a(Html::img('@web/img/Member/Member_2.0.png'), [''], ['class' => 'waves-effect']) ?>
    </li>
    <li>
        <?php echo Html::a(Html::img('@web/img/Member/Member_3.0.png'), [''], ['class' => 'waves-effect']) ?>
    </li>
    <li>
        <?php echo Html::a(Html::img('@web/img/Member/Member_4.0.png'), [''], ['class' => 'waves-effect']) ?>
    </li>
    <li>
        <?php echo Html::a(Html::img('@web/img/Member/Member_5.0.png'), [''], ['class' => 'waves-effect']) ?>
    </li>
    <li>
        <?php echo Html::a(Html::img('@web/img/Member/Member_6.png'), ['site/logout'], ['class' => 'black-text']) ?>
    </li>
</ul>
