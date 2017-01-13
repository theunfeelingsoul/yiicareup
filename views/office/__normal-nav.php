<?php use yii\helpers\Html;	 ?>
<div id="desktop-side-nav" class="col s12 l3 hide-on-med-and-down">
    <div class="collection">
        <!-- <a href="#!" class="waves-effect collection-item">Home</a> -->
        <?php echo Html::a('Search', ['office/search'], ['class' => 'waves-effect collection-item']) ?>
        <?php echo Html::a('Offices', ['office/index'], ['class' => 'waves-effect collection-item']) ?>
        <a href="#!" class="waves-effect collection-item active">Therapist</a>
        <a href="#!" class="waves-effect collection-item">Events</a>
        <a href="#!" class="waves-effect collection-item">Recruit</a>
        <a href="#!" class="waves-effect collection-item">Share</a>
        
    </div>
</div>