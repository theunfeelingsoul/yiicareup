<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicedisplay */

$this->title = 'Update Servicedisplay: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Servicedisplays', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicedisplay-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
