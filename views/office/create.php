<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = 'Create Office';
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col s12 m4 l3">
		 <?= 
        	$this->render('__normal-nav', [
        	// $this->render('__slide-out-nav', [
        	'model'=> $model 
        ]); ?>
	</div>
	<div class="office-create col s12 m8 l8">
	    <h1><?= Html::encode($this->title) ?></h1>
		<div class="card">
			<div class="card-content">
				<span class="card-title">Form</span>
			    <?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>
			</div><!--./card-content-->
		</div><!--./card-->
	</div>
</div>
