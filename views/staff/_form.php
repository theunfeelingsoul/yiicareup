<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Staffskill;


$staffSkillList = ArrayHelper::map(Staffskill::find()->all(), 'id', 'skill');

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(['options' => [  'enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'staff_skill')->dropdownList($staffSkillList,
                ['prompt'=>'Choose']
            ); 
        ?>

    <?= $form->field($model, 'staff_years_of_exp')->textInput() ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false); ?>

    <?= $form->field($model, 'office_id')->hiddenInput(['value'=>ArrayHelper::getValue(Yii::$app->request->get(), 'get_office_id')])->label(false); ?>

    <?= $form->field($model, 'appeal')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'image_path')->fileInput(['class'=>'']); ?>

    <div class="row form-group">
        <?php 
            // only show if its empty
            if (!empty($model->image_path)) {
              echo Html::img($model->image_path, [
                            'alt'=>'', 'class'=>'','width'=>'200'
                            ]);
            } 
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
