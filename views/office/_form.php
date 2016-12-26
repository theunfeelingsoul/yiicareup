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
  <ul id="slide-out" class="side-nav">
    <li><div class="userView">
      <div class="background">
        <img src="images/office.jpg">
      </div>
      <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
      <a href="#!name"><span class="white-text name">John Doe</span></a>
      <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
<div class="col s12 m6 l10">
    <div class="office-form">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        'errorCssClass' => 'errord'
        ]); ?>
        <?= $form->errorSummary($model) ?>
        <div class="row">
            <div class="input-field col s12 l6">
                <?= $form->field($model, 'Oname')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="input-field col s12 l6">
                <?= $form->field($model, 'service')->dropDownList(
                    ArrayHelper::map(Services::find()->all(),'Sid','Sname'),
                    ['prompt'=>'Choose your option','multiple'=>'multiple',
                    
                    ]
                ); ?>
            </div>
        </div>    
        <div class="row">
            <div class="input-field col s12 l6">
                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="input-field col s12 l6">
                <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 l6">
                <?= $form->field($model, 'email',[ 'labelOptions' => [ 'data-error' => 'wrong','data-success'=>'right' ]])->textInput(['class' => 'validate']) ?>
            </div>


            <div class="input-field col s12 l6">
            <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <!-- < $form->field($model, 'area')->textInput(['maxlength' => true]) ?> -->
        <div class="row">
            <div class="input-field col s12 l6">
              <?= $form->field($model, 'area')->dropDownList(
                    ArrayHelper::map(Osaka::find()->all(),'Cid','Cname'),
                    ['prompt'=>'Default Category','multiple'=>'multiple']
                ); ?>

            </div>
            <div class="input-field col s12 l6">
            <?= $form->field($model, 'leader')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 l6">
                <?= $form->field($model, 'skills')->dropDownList(
                    ArrayHelper::map(tags::find()->all(),'Skid','Skname'),
                    ['prompt'=>'Default Category','multiple'=>'multiple']
                ); ?>
            </div>
            <div class="input-field col s12 l6">
                <?= Html::activeTextarea($model, 'apeal',['class' => 'materialize-textarea']) ?>
            <label for="textarea1">Appeal</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 l6">
                
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            </div>
            <!-- < $form->field($model, 'imgname')->fileInput() ?> -->

            <div class="input-field col s12 l6">
                <?= Html::img($model->imgname, ['alt'=>'some', 'class'=>'thing','width'=>'200']);?> 
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
            </div>
        </div>

       
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

  <script>
                                      
                                    </script>
