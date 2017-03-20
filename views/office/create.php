<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = '事業所を作る';
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
	<div class="office-create col-md-12">
	    <h1>ケア・アップ　事業所様専用ページ</h1>
	    <div class="row">
			<h4>ようこそ <?=Yii::$app->user->identity->name; ?>さん</h4>
			<legend> 新規事業所のメイン情報を作成しましょう</legend>
			<p>※こちらで入力した情報は公開されます</p>
	    </div>
	    
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
	</div>
</div>
