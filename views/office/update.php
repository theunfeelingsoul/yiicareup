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

     <div class="fixed-action-btn horizontal click-to-toggle">
            <a class="btn-floating btn-large red">
                <i class="material-icons">menu</i>
            </a>
            <ul>
         
                <li>
                    <?= Html::a( '<i class="material-icons">visibility</i>', $url = ['office/viewmore','id'=>$model->id], $options = ['class'=>'waves-effect waves-light btn-floating green'] ) ?>
                </li>
                <li>
                    <?= Html::a( '<i class="material-icons">list</i>', $url = ['office/index','id'=>$model->id], $options = ['class'=>'waves-effect waves-light btn-floating orange'] ) ?>
                </li>
            
                <!-- <li><a class="btn-floating yellow darken-1"><i class="material-icons">delete</i></a></li>
                <li><a class="btn-floating green"><i class="material-icons">visibility</i></a></li> -->
                <!-- <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li> -->
            </ul>
        </div>

    <div class="office-update col s12 m8 l8">

        <h1><?= Html::encode($this->title) ?></h1>
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

    </div>
</div>
