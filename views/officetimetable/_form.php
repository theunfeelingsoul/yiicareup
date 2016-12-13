<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Officetimetable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="officetimetable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day_and_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skid')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'office_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
