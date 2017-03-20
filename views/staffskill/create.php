<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Staffskill */

$this->title = 'Create Staffskill';
$this->params['breadcrumbs'][] = ['label' => 'Staffskills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffskill-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
