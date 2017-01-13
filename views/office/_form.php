<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Office;
use app\models\Services;
use app\models\Osaka;
use app\models\Tags;
use yii\helpers\BaseHtml;

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="office-form">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>
        <?= $form->errorSummary($model) ?>
        <div class="row">
            <div class="input-field col s12 m6 l6">
                <?= $form->field($model, 'Oname')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="input-field col s12 m6 l6">
                <?= $form->field($model, 'leader')->textInput(['maxlength' => true]) ?>
            </div>
        </div>    
        <div class="row">
            <div class="input-field col s12 m6 l6">
                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="input-field col s12 m6 l6">
                <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6 l6">
                <?= $form->field($model, 'email',[ 'labelOptions' => [ 'data-error' => 'wrong','data-success'=>'right' ]])->textInput(['class' => 'validate']) ?>
            </div>

            <div class="input-field col s12 m6 l6">
                <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        
        <div class="row">
            
            <div class="input-field col s12 m6 l6">
               
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            </div>

             <div class="input-field col s12 m6 l6 ">
                <?= Html::activeTextarea($model, 'apeal',['class' => 'materialize-textarea']) ?>
                <label for="textarea1"><?php echo $model->attributeLabels()['apeal'] ?></label>
                
            </div>
        </div>

        <div class="row">
            <div class="form-group field-office-service required">
                <div class="input-field col s12">
                    <?= Html::activeDropDownList($model, 'service', ArrayHelper::map(Services::find()->all(), 'Sid', 'Sname'),['multiple'=>'multiple','prompt'=>'Choose a service']); ?>
                    <label><?php echo $model->attributeLabels()['service'] ?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <?php echo Html::activeDropDownList($model, 'skills', ArrayHelper::map(tags::find()->all(), 'Skid', 'Skname'),['multiple'=>'multiple','prompt'=>'Choose a skill']); ?>
                <label><?php echo $model->attributeLabels()['skills'] ?></label>

            </div>
        </div>

        <div class="row">
             <div class="input-field col s12">
                <?= Html::activeDropDownList($model, 'area', ArrayHelper::map(Osaka::find()->all(), 'Cid', 'Cname'),['multiple'=>'multiple','prompt'=>'Choose an area']); ?>
                <label><?php echo $model->attributeLabels()['area'] ?></label>

            </div>
        </div>
        <div class="row">
           

            <div class="input-field col s12 ">
                
                <div class="row">
                    <div class="file-field input-field">
                        <div class="waves-effect waves-light btn">
                            <span>File</span>
                             <?= $form->field($model, 'imgname')->fileInput(['class'=>''])->label(false); ?>
                            <!-- <input type="file"> -->
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php 
                        // only show if its empty
                        if (!empty($model->imgname)) {
                             echo Html::img($model->imgname, [
                                            'alt'=>'some', 'class'=>'thing','width'=>'200'
                                            ]);
                        } 
                     ?>
                </div>


            </div> <!--./input-field-->
        </div>

       
        <div class="row">
            <div class="input-field right ">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'waves-effect waves-light btn ' : 'waves-effect waves-light btn']) ?>

            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    </div>
    </div>
    </div>
