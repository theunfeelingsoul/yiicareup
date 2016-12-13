<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Skillstimetable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skillstimetable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day_and_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skid')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
