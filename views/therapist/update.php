<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Therapist */

$this->title = 'Update Therapist: ' . $model->tp_id;
$this->params['breadcrumbs'][] = ['label' => 'Therapists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tp_id, 'url' => ['view', 'id' => $model->tp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="therapist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
