<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TagsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tags-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Skid') ?>

    <?= $form->field($model, 'Skgroup') ?>

    <?= $form->field($model, 'Sktag') ?>

    <?= $form->field($model, 'Skname') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
