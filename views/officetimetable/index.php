<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfficetimetableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Officetimetables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="officetimetable-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Officetimetable', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'day_and_time',
            'skid',
            'user_id',
            'status',
            // 'office_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
