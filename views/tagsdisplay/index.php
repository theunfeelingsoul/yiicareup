<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagsdisplaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tagsdisplays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagsdisplay-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tagsdisplay', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tag_name',
            'user_id',
            'office_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
