<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TherapistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tp_id') ?>

    <?= $form->field($model, 'of_id') ?>

    <?= $form->field($model, 'tp_name') ?>

    <?= $form->field($model, 'tp_age') ?>

    <?= $form->field($model, 'tp_exp') ?>

    <?php // echo $form->field($model, 'tp_skills') ?>

    <?php // echo $form->field($model, 'imgname') ?>

    <?php // echo $form->field($model, 'img') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
