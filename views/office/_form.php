<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Office;
use app\models\Services;
use app\models\Osaka;
use app\models\Tags;

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="office-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->errorSummary($model) ?>

     <!-- $form->field($model, 'id')->textInput(['value' => '1']) ?> -->

     <!-- $form->field($model, 'Onum')->textInput(['maxlength' => true]) ?> -->

     <?= $form->field($model, 'Oname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service')->dropDownList(
            ArrayHelper::map(Services::find()->all(),'Sid','Sname'),
            ['prompt'=>'Default Category','multiple'=>'multiple']
        ); ?>

    

    

    

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

     <!-- $form->field($model, 'blanktime_s')->textInput(['value' => 'Your Value']) ?> -->

     <!-- $form->field($model, 'blanktime_f')->textInput(['value' => 'Your Value']) ?> -->

    <!-- <$form->field($model, 'holiday')->textInput(['maxlength' => true]) ?> -->



 

   
</div>


    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <!-- < $form->field($model, 'area')->textInput(['maxlength' => true]) ?> -->

      <?= $form->field($model, 'area')->dropDownList(
            ArrayHelper::map(Osaka::find()->all(),'Cid','Cname'),
            ['prompt'=>'Default Category','multiple'=>'multiple']
        ); ?>


     <!-- $form->field($model, 'staff')->textInput(['value' => '2']) ?> -->

     <!-- //$form->field($model, 'service')->textInput(['maxlength' => true])  -->

     
    <?= $form->field($model, 'leader')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'skills')->dropDownList(
        ArrayHelper::map(tags::find()->all(),'Skid','Skname'),
        ['prompt'=>'Default Category','multiple'=>'multiple']
    ); ?>

     <!-- $form->field($model, 'apeal')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'apeal')->textarea(array('rows'=>2,'cols'=>5)); ?>


    <?= Html::img($model->imgname, ['alt'=>'some', 'class'=>'thing','width'=>'200']);?> 

    <?= $form->field($model, 'imgname')->fileInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

  <script>
                                      
                                    </script>
