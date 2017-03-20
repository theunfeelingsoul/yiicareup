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

<div class="col s12 m6 l6">
    <div class="office-form">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'errorCssClass' => 'errord'
        ]); ?>
        <?= $form->errorSummary($model) ?>
        <div class="row">
            <div class="input-field col s12">
                <?= $form->field($model, 'Oname')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <?= $form->field($model, 'service')->dropDownList(
                    ArrayHelper::map(Services::find()->all(),'Sid','Sname'),
                    ['prompt'=>'Choose your option','multiple'=>'multiple',

                    ]
                ); ?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="input-field col s12">
                <?= $form->field($model, 'email',[ 'labelOptions' => [ 'data-error' => 'wrong','data-success'=>'right' ]])->textInput(['class' => 'validate']) ?>
            </div>
        </div>



        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <!-- < $form->field($model, 'area')->textInput(['maxlength' => true]) ?> -->

          <?= $form->field($model, 'area')->dropDownList(
                ArrayHelper::map(Osaka::find()->all(),'Cid','Cname'),
                ['prompt'=>'Default Category','multiple'=>'multiple']
            ); ?>



        <?= $form->field($model, 'leader')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'skills')->dropDownList(
            ArrayHelper::map(tags::find()->all(),'Skid','Skname'),
            ['prompt'=>'Default Category','multiple'=>'multiple']
        ); ?>
        <div class="row">
            <div class="input-field col s12">
                <?= Html::activeTextarea($model, 'apeal',['class' => 'materialize-textarea']) ?>
            <label for="textarea1">アピールポイント(150文字程度)</label>
            </div>
        </div>


        <?= Html::img($model->imgname, ['alt'=>'some', 'class'=>'thing','width'=>'200']);?>

        <!-- < $form->field($model, 'imgname')->fileInput() ?> -->

        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                 <?= $form->field($model, 'imgname')->fileInput(['class'=>''])->label(false); ?>
                <!-- <input type="file"> -->
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
                <!-- <label for="textarea1">Movie URL</label> -->
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '作成' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

  <script>

                                    </script>
