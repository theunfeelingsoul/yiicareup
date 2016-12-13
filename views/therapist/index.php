<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TherapistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Therapists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="therapist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Therapist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tp_id',
            'of_id',
            'tp_name',
            'tp_age',
            'tp_exp',
            // 'tp_skills',
            // 'imgname',
            // 'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
