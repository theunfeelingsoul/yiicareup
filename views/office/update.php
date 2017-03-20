<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = '事業所情報更新: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '事業所', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<div class="row">

    <div class="office-update">

        <h1><?= Html::encode($this->title) ?></h1>

    	    <?= $this->render('_form', [
    	        'model' => $model,
                'user_offices'              => $user_offices,
                'user_office_id'            => $model->id,
                'skills_names_array'        => $skills_names_array,
                'new_skilltimetable_array'  => $new_skilltimetable_array,
                'office_timetable'          => $office_timetable,
    	    ]) ?>

    </div>


</div>
