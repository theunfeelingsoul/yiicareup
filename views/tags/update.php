<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tags */

$this->title = 'Update Tags: ' . $model->Skid;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Skid, 'url' => ['view', 'id' => $model->Skid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tags-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
