<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Therapist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'of_id')->textInput() ?>

    <?= $form->field($model, 'tp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tp_age')->textInput() ?>

    <?= $form->field($model, 'tp_exp')->textInput() ?>

    <?= $form->field($model, 'tp_skills')->textInput() ?>

    <?= $form->field($model, 'imgname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
