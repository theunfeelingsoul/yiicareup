<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicedisplay */

$this->title = 'Create Servicedisplay';
$this->params['breadcrumbs'][] = ['label' => 'Servicedisplays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicedisplay-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
