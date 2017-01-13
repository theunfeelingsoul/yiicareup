<?php use yii\widgets\ActiveForm; 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;?>

<?= GridView::widget([
                'dataProvider' => $resultsModel,
               

            
            ]); ?>