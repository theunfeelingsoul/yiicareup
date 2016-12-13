<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Therapist */

$this->title = $model->tp_id;
$this->params['breadcrumbs'][] = ['label' => 'Therapists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="therapist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tp_id',
            'of_id',
            'tp_name',
            'tp_age',
            'tp_exp',
            'tp_skills',
            'imgname',
            'img',
        ],
    ]) ?>

</div>
