<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = $model->Oname;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="office-view">
        <div class="col s12 m4 l3">

            <?= $this->render('__normal-nav', [
            ]); ?>
        </div> <!--./col-->

            <div class="fixed-action-btn horizontal click-to-toggle">
                <a class="btn-floating btn-large red">
                    <i class="material-icons">menu</i>
                </a>
                <ul>
                    <li>
                        <?= Html::a( '<i class="material-icons">mode_edit</i>', $url = ['office/update','id'=>$model->id], $options = ['class'=>'waves-effect waves-light btn-floating blue'] ) ?>
                    </li>
                    <li>
                        <?= Html::a( '<i class="material-icons">visibility</i>', $url = ['office/viewmore','id'=>$model->id], $options = ['class'=>'waves-effect waves-light btn-floating green'] ) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="material-icons">delete</i>', ['delete', 'id' => $model->id], [
                            'class' => 'waves-effect waves-light btn-floating red',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </li>
                    <!-- <li><a class="btn-floating yellow darken-1"><i class="material-icons">delete</i></a></li>
                    <li><a class="btn-floating green"><i class="material-icons">visibility</i></a></li> -->
                    <!-- <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li> -->
                </ul>
            </div>

        <div class="row">
            <div class="col s12 m8 l6">
                <div class="card">
                    <div class="card-content">
                        <h1><?= Html::encode($this->title) ?></h1>

                       <!--  <p>
                            </?= Html::a('View more', ['viewmore', 'id' => $model->id], ['class' => 'waves-effect waves-light btn']) ?>
                             </?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'waves-effect waves-light btn  light-blue']) ?>
                            
                        </p> -->
                        <?= DetailView::widget([
                            'model' => $model,
                            // $options => ['class' => 'bordered'],
                            'options'=>['class'=>'bordered highlight'],
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
                    </div><!--./card-content-->
                    <div class="card-action">
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'waves-effect waves-teal btn-flat red',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <!-- <a href="#">This is a link</a> -->
                        <!-- <a href="#">This is a link</a> -->
                    </div> <!--./card-action-->
                </div> <!--./card-action-->
            </div><!--./col s12 m8 l5-->
        </div><!--./col s12 m8 l5-->

    </div> <!--./office-view-->
</div> <!--./row-->






