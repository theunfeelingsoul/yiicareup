<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offices';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Side Nav -->
<div class="row">
    <div class="col s12 m4 l3">

        <?= $this->render('__normal-nav', [
        ]); ?>
    </div>
    <div class="col s12 m8 l8">

        <div class="office-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Office', ['create'], ['class' => 'waves-effect waves-light btn']) ?>
            </p>
        <div class="row">
        <div class="card">
            <div class="card-content">
                <?= GridView::widget([  
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,  
                    
                    // 'cssFile' => Url::base('https') . '/materialize/css/materialize.css',

                    'tableOptions' =>    ['class' => 'bordered highlight responsive-table'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        // "itemsCssClass" => "striped",
                        // 'id',
                        // 'Mtag',
                        'Oname',    
                        'leader',
                        // 'url:url',
                        'apeal',
                        'tel',
                        // 'fax',
                        'email:email',
                        // 'holiday',
                        // 'location',
                        // 'area',
                        // 'staff',
                        // 'service',
                        // 'imgname',

                        ['class' => 'yii\grid\ActionColumn','template' => '{view} {update} {delete}',
                            'buttons' => [
                                'view' => function ($url) {
                                    return Html::a(
                                        '<span class="">
                                        <i class="small material-icons">visibility</i></span>',
                                        $url, 
                                        [
                                            'title' => 'view',
                                            'data-pjax' => '0',
                                        ]
                                    );
                                },
                                'update' => function ($url) {
                                    return Html::a(
                                        '<span class="">
                                        <i class="small material-icons">mode_edit</i></span>',
                                        $url, 
                                        [
                                            'title' => 'Edit',
                                            'data-pjax' => '0',
                                        ]
                                    );
                                },
                                'delete' => function ($url) {
                                    return Html::a(
                                        '<span class="">
                                        <i class="small material-icons">delete</i></span>',
                                        $url, 
                                        [
                                            'title' => 'delete',
                                            'data-pjax' => '0',
                                            'data-method' => 'POST',    
                                             // 'confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.',
                                             'onClick' => 'return confirm("Your confirmation message?")'
                                        ]
                                    );
                                },

                            ],
                        ],

                    ],
                ]); ?>
            </div>
        </div>
        </div>
        </div>
    </div>

</div>
