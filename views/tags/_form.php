<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tags */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Skgroup')->textInput() ?>

    <?= $form->field($model, 'Sktag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Skname')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
