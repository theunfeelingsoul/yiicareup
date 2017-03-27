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

<!--     Necessarily items    -->
        <?= $form->field($model, 'Onum')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Oname')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'service')->dropdownList($serviceList,
                ['multiple'=>'multiple']
            );
        ?>
        <?= $form->field($model, 'skills')->dropdownList($skillList,
                ['multiple'=>'multiple']
            );
        ?>
        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'area')->dropdownList($areaList,
                ['multiple'=>'multiple']
            );
        ?>
        <?= $form->field($model, 'leader')->textInput(['maxlength' => true]) ?>

<!--     NOT necessarily items    -->
        <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email')->textInput([]) ?>
        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'apeal')->textarea(['rows' => '6']) ?>
        <?= $form->field($model, 'imgname')->fileInput(['class'=>''])->label(false); ?>
                
        <div class="row">
            <?php
                // only show if its empty
                if (!empty($model->imgname)) {
                      echo Html::img($model->imgname, [
                                    'alt'=>'some', 'class'=>'thing','width'=>'200'
                                    ]);
                }
             ?>
        </div>

        <!-- OFFICE AND SKILL TIMETABLE -->
        <!-- ONLY SHOWS UP ON UPDATE -->
        <?php if (Yii::$app->controller->action->id == 'update'): ?>
            <!-- Tab panes -->
            <div class="row">
                <!-- Nav tabs -->
                <h1>空き時間</h1>
                <ul class="nav nav-tabs form-skill-time-table" id="myTabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#office-timetable" aria-controls="office-timetable" role="tab" data-toggle="tab">
                            事業所
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#skill-timetable" aria-controls="skill-timetable" role="tab" data-toggle="tab">
                            各資格の空き
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="office-timetable">
                        <?= $this->render('__office-timetable', [
                            'model'=> $model,
                            'office_timetable'          => $office_timetable,
                            'user_office_id'            => $model->id,
                            ]);
                         ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="skill-timetable">
                        <?= $this->render('__skill-timetable', [
                            'model'=> $model,
                            'skills_names_array'        => $skills_names_array,
                            'new_skilltimetable_array'  => $new_skilltimetable_array,
                            'user_office_id'            => $model->id,
                        ]) ?>
                    </div>
                </div><!--./tab-content-->
            </div><!--./row-->
        <?php endif ?>

       
        <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '事業所登録' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    </div>
    </div>
    </div>

