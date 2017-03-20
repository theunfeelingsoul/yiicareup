<?php

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Office;
use app\models\Services;
use app\models\Osaka;
use app\models\Tags;
use yii\helpers\BaseHtml;

$serviceList = ArrayHelper::map(Services::find()->all(), 'Sid', 'Sname');
$skillList = ArrayHelper::map(tags::find()->all(), 'Skid', 'Skname');
$areaList = ArrayHelper::map(Osaka::find()->all(), 'Cid', 'Cname');

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $form yii\widgets\ActiveForm */

?>

    <div class="office-form">
        <?php $form = ActiveForm::begin([
            'options' =>    [  'enctype' => 'multipart/form-data',
                                'layout' => 'horizontal',
                                'action' =>['office/updatez'],
                                // 'fieldConfig' => [
                                    // 'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                    'horizontalCssClasses' => [
                                        'label' => 'col-sm-4',
                                        'offset' => 'col-sm-offset-4',
                                        'wrapper' => 'col-sm-8',
                                        'error' => '',
                                        'hint' => '',
                                    ],
                                // ],

                            ],
        ]); ?>
        <?= $form->errorSummary($model) ?>
      
        
        <?= $form->field($model, 'skills')->dropdownList($skillList,
                ['multiple'=>'multiple','prompt'=>'Choose']
            ); 
        ?>

       
        <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '事業所作成' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    </div>
    </div>
    </div>
