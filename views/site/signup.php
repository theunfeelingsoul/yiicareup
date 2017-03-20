<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\captcha\Captcha;

$this->title = '新規登録';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
//        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>
<div class="site-signup">
     <!-- <div class="row">
         <div class="signup-menu">
            <div class="col-xs-6 pull-left">
                </?= Html::img( Url::base().'/img/web-logo.png', ['alt'=>'"alt"', 'class'=>'img-responsive','width'=>''] ) ?>
            </div>
            <div class="col-xs-3 pull-right">
                </?php echo Html::a('Signup', ['site/signin',], ['class' => 'btn btn-default']); ?>
            </div>
        </div>
    </div> -->
    <h1><?= Html::encode($this->title) ?></h1>
    <!--    利用規約にチェック後，登録用リストを表示したい     -->

    <?php if (Yii::$app->session->hasFlash('新規登録を承りました。登録に使用されたメールアドレスからメール認証を行ってください。')): ?>

        <div class="alert alert-success">
            新規ご登録いただき誠にありがとうございます。メール認証により登録を確定されてから，ログインを行ってください。
        </div>

    <?php else: ?>


    <div class="sign-in-banner">
        <h4>以下の流れに沿って新規アカウントの登録を行いましょう。</h4>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12 col-xs-12">
            <?php $form = ActiveForm::begin([
                // 'id' => 'form-signup'
                 'options' => ['class' => 'signin-card '],
            ]); ?>
           <!--  </?= Html::img( Url::base().'/img/f.png', ['alt'=>'"alt"', 'class'=>'img-responsive img-circle login-avatar','width'=>'80'] ) ?> -->
                    <?= $form->field($model, 'signupuser')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <!--※【確認用】先ほどと同じパスワードを入力<br />-->
                    <?= $form->field($model, 'cid')->textInput(['autofocus' => true]) ?>
                <!-- <li>
                    </?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',]) ?>
                </li> -->
                    <?= Html::a('ご利用規約', ['usepolicy']) ?>および<?= Html::a('個人情報保護方針', ['privacypolicy']) ?>に関する声明をご確認の上，以下のボタンをクリックしてください。
                    <br />
                    新規登録用URLを記載したメールをお送り致します。
                    <br />
                    <br />
                    <p>
                        ※「新規登録」をクリックされますと，利用規約/プライバシーポリシーに関する声明に同意したものとみなします。
                    </p>
                    <br />
                    <div class="row">
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-4 col-xs-12 col-sm-12">
                        <?= Html::submitButton('新規登録', ['class' => 'btn btn-lg btn-default sign-up-btn form-contol', 'name' => 'signup-button']) ?>
                        </div>
                    </div>
                    </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div><!--row-->
    <?php endif; ?>
</div>
