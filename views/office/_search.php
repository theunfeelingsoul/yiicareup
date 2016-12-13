<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OfficeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="office-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>


    <?= $form->field($model, 'Onum') ?>

    <?= $form->field($model, 'Oname') ?>

    <?= $form->field($model, 'leader') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'apeal') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'blanktime_s') ?>

    <?php // echo $form->field($model, 'blanktime_f') ?>

    <?php // echo $form->field($model, 'holiday') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'staff') ?>

    <?php // echo $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'imgname') ?>

    <?php // echo $form->field($model, 'img') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
