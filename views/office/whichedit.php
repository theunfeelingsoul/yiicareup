<?php 
use yii\helpers\Html;

 ?>
<div class="col-xs-12 col-sm-6 col-md-6 text-center">
	<?= Html::a( '<img class="img-responsive" src="img/Member/new.png" alt="新規事業所作成"/>', $url = ['office/create'], $options = ['class'=>''] ) ?>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 text-center">
	<?= Html::a( '<img class="img-responsive" src="img/Member/edit.png" alt="既存の事業所編集"/>', $url = ['office/index'], $options = ['class'=>''] ) ?>
</div>