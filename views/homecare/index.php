<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HomecareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homecares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homecare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Homecare', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'office_id',
            'hmc_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
