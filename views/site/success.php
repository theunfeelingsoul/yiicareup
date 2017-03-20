<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'success';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-usepolicy container">
    <h1>認証用メールをお送り致しました。</h1>
    <br />
    <h4>新規ご登録いただき誠にありがとうございます。</h4>
    <br />
    <h4>メールに記載されたurlをクリックして本登録を行ってください。</h4>
    <br />
    <h5>
        ※同じメールアドレスによる複数回の新規登録はできません。
        <?= Html::a('続けて新規登録へ', ['signup']) ?><br />
    </h5>
</div>
