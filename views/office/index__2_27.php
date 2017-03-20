<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '事業所一覧';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Side Nav -->
<div class="row">
   
    <div class="col-md-12">

        <div class="office-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="row">
                    <!-- show on desktop only -->
                    <div class="hidden-xs">
                        <?= GridView::widget([  
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,  
                            
                            // 'cssFile' => Url::base('https') . '/materialize/css/materialize.css',

                            'tableOptions' =>    ['class' => 'bordered highlight'],
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                // "itemsCssClass" => "striped",
                                // 'id',
                                // 'Mtag',
                                 array(
                                    'attribute' => 'image',
                                    'format' => 'html', 
                                    'value' => function ($data) {
                                    return Html::img(Yii::getAlias('@web').'/'.$data['imgname'],
                                        ['width' => '70px']);
                                    },

                                ),
                                'Oname',    
                                'leader',
                                'url:url',
                                // 'apeal',
                                'tel',
                                // 'fax',
                                'email:email',
                                // 'holiday',
                                'location',
                                // 'area',
                                // 'staff',
                                // 'service',
                                // 'imgname',
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                     <!-- show om mobile only -->
                    <div class="visible-xs">
                        <?= GridView::widget([  
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,  
                            
                            // 'cssFile' => Url::base('https') . '/materialize/css/materialize.css',

                            'tableOptions' =>    ['class' => 'bordered highlight'],
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                // "itemsCssClass" => "striped",
                                // 'id',
                                // 'Mtag',
                                'Oname',    
                                // 'leader',
                                // 'url:url',
                                // 'apeal',
                                'tel',
                                // 'fax',
                                'email:email',
                                // 'holiday',
                                // 'location',
                                // 'area',
                                // 'staff',
                                // 'service',
                                // 'imgname',
                                ['class' => 'yii\grid\ActionColumn'],
                                

                            ],
                        ]); ?>
                    </div>
            </div>
        </div>
    </div>

</div>
