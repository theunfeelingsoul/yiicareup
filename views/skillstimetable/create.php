<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Skillstimetable */

$this->title = 'Create Skillstimetable';
$this->params['breadcrumbs'][] = ['label' => 'Skillstimetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skillstimetable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
