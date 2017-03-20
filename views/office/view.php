<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = $model->Oname;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="office-view">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('View more', ['viewmore', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Create', ['create'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                
            </p>
            <?= DetailView::widget([
                'model' => $model,
                // 'options'=>['class'=>'table table-striped table-bordered detail-view'],
                'attributes' => [
                    // 'id',
                    'Oname',
                    'leader',
                    'url:url',
                    'apeal',
                    'tel',
                    'fax',
                    'email:email',
                    'location',
                    'area',
                    'staff',
                    [
                        'attribute'=>'imgname',
                        'value'=>$model->imgname,
                        'format' => ['image',['width'=>'50','height'=>'50']],
                    ],
                    [
                        'label'=>'skills',
                        'value'=>$model->findTagNamesFromString($model->skills),
                    ],
                    [
                        'label'=>'area',
                        'value'=>$model->findAreaNamesFromString($model->area),
                    ],

                    [
                        'label'=>'service',
                        'value'=>$model->findServiceNamesFromString($model->service),
                    ],
                ],
            ]) ?>
    </div> <!--./office-view-->






