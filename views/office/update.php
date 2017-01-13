<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = 'Update Office: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <div class="col s12 m4 l3">
        <?= 
            $this->render('__normal-nav', [
            // $this->render('__slide-out-nav', [
            'model'=> $model 
        ]); ?>
    </div>  
    <div class="office-update col s12 m8 l8">

        <h1><?= Html::encode($this->title) ?></h1>
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

    </div>
</div>
