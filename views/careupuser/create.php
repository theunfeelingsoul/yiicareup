<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Careupuser */

$this->title = 'Create Careupuser';
$this->params['breadcrumbs'][] = ['label' => 'Careupusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="careupuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
