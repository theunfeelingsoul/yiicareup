<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffskillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staffskills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffskill-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Staffskill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'skill',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
