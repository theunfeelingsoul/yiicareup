<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offices';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Side Nav -->
<div class="col s12 m4 l3">

    <?= $this->render('__slide-out-nav', [
    ]); ?>
</div>
<div class="col s12 m8 l8">

    <div class="office-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Office', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                // 'Mtag',
                'Onum',
                'Oname',
                'leader',
                // 'url:url',
                // 'apeal',
                // 'tel',
                // 'fax',
                // 'email:email',
                // 'blanktime_s',
                // 'blanktime_f',
                // 'holiday',
                // 'location',
                // 'area',
                // 'staff',
                // 'service',
                // 'imgname',
                // 'img',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
