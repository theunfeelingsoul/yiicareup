<?php use yii\helpers\Html;	 ?>
<div id="desktop-side-nav" class="col s12 l3 hide-on-med-and-down">
    <div class="collection">
        <!-- <a href="#!" class="waves-effect collection-item">Home</a> -->
        <?php echo Html::a(Html::img('@web/img/find/6.png', ['width'=>'220px']), ['office/search'], ['class' => 'waves-effect']) ?>

        <?php echo Html::a(Html::img('@web/img/Member/Member_1.png', ['width'=>'220px']), ['office/index'], ['class' => 'waves-effect']) ?>

        <?php echo Html::a(Html::img('@web/img/Member/Member_2.0.png', ['width'=>'220px']), [''], ['class' => 'waves-effect']) ?>

        <?php echo Html::a(Html::img('@web/img/Member/Member_3.0.png', ['width'=>'220px']), [''], ['class' => 'waves-effect']) ?>

        <?php echo Html::a(Html::img('@web/img/Member/Member_4.0.png', ['width'=>'220px']), [''], ['class' => 'waves-effect']) ?>

        <?php echo Html::a(Html::img('@web/img/Member/Member_5.0.png', ['width'=>'220px']), [''], ['class' => 'waves-effect']) ?>

        <?php echo Html::a(Html::img('@web/img/Member/Member_6.png', ['width'=>'220px']), ['site/logout'], $options = ['class'=>'','data-method' => 'POST']) ?>
    </div>
</div>
