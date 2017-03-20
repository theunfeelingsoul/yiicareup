<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .signin-card {
    background-color: #f7f7f7;
    /*padding: 20px 25px 30px;*/
     margin: 0 auto !important; 
    /*width: 304px;*/
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        /*width: 274px;*/
    padding: 30px 30px;
}

.sign-in-banner{
    text-align: center;
}

.login-avatar{
    margin: 0 auto;
    margin-bottom: 30px;

}

</style>
<div class="row">
    <div class="sign-in-banner">

            <h4>介護事業所関連のお客様ログインフォーム</h4>
        </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <!-- <h1>< Html::encode($this->title) ?></h1> -->

        <!-- <p>Please fill out the following fields to login:</p> -->
        
        <?php $form = ActiveForm::begin([
            // 'id' => 'signin-card',
            'options' => ['class' => 'signin-card '],
            // 'layout' => 'horizontal',
            // 'fieldConfig' => [
            //     'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            //     'labelOptions' => ['class' => 'col-lg-1 control-label'],
            // ],
        ]); ?>
              <?= Html::img( Url::base().'/img/f.png', ['alt'=>'"alt"', 'class'=>'img-responsive img-circle login-avatar','width'=>'80'] ) ?>

           
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

      

            <div class="form-group" align="center">
                <div class="">
                    <?= Html::submitButton('ログイン', ['class' => 'btn login-btn', 'name' => 'login-button']) ?>
                </div>
            </div>



        <?php ActiveForm::end(); ?>
        <div class="signin-signup">
            <?= Html::tag('span', '', ['class' => 'glyphicon glyphicon-user']) ?>
            登録がお済みでない方は
            <?= Html::a('こちら', ['signup']) ?>
        </div>

    </div>
</div>
