<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tagsdisplay */

$this->title = 'Create Tagsdisplay';
$this->params['breadcrumbs'][] = ['label' => 'Tagsdisplays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagsdisplay-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
