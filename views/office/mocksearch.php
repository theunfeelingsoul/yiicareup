<?php 
use yii\widgets\ActiveForm; 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use app\models\Office;
use app\models\Services;
use app\models\Osaka;
use app\models\Tags;

$serviceList = ArrayHelper::map(Services::find()->all(), 'Sid', 'Sname');
$skillList = ArrayHelper::map(tags::find()->all(), 'Skid', 'Skname');
$areaList = ArrayHelper::map(Osaka::find()->all(), 'Cid', 'Cname');


?>

<h2>SEARCH</h2>
<?php $form = ActiveForm::begin([
	'id' => 'login-form',
	'options' => ['class' => ''],
	'action' => 'index.php?r=office/mocksearch',
]) ?>
	<div class="sx col-md-3">
		<?= $form->field($model, 'service')->dropdownList($serviceList
		); 
		?>
	</div>
<?php ActiveForm::end() ?>


<div class="search-img-bg">
	<div class="search-bg col-md-11">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#search-by-name" aria-controls="search-by-name" role="tab" data-toggle="tab">
					 name
				</a>
			</li>
			<li role="presentation">
				<a href="#search-by-service-tag-time-area" aria-controls="search-by-service-tag-time-area" role="tab" data-toggle="tab">
					Advanced Search
				</a>
			</li>
			
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="search-by-name">
				<?php $form = ActiveForm::begin([
					'id' => 'login-form',
					'options' => ['class' => ''],
					'action' => 'index.php?r=office/officesearch',
				]) ?>

					<?= $form->errorSummary($model); ?>
					<div class="row">
						<div class="form-group">
							<div class="col-md-5">
								<?= $form->field($model, 'Oname')->textInput()->input('Oname', ['placeholder' => "Search Business Name"]); ?>
							</div>
							
						</div>
					</div>
					<div class="">
						<div class="row form-group">
							<div class="col-md-3">
								<?= Html::submitButton('ケンサク', ['class' => 'btn btn-default form-control search-by-name-submit-button']) ?>
							</div>
						</div>
					</div>
				<?php ActiveForm::end() ?>
			</div>
			<div role="tabpanel" class="tab-pane" id="search-by-service-tag-time-area">
				<?php $form = ActiveForm::begin([
						'id' => 'login-form',
						'options' => ['class' => ''],
						'action' => 'index.php?r=office/mocksearch',
					]) ?>
						<div class="row">
							<div class="sx col-md-3">
								<?= $form->field($model, 'service')->dropdownList($serviceList
						            ); 
						        ?>
							</div>
							<div class="col-md-3">
						        <?php echo $form->field($model, 'skills[]')->checkboxList($skillList); ?>
							</div>
							<div class="col-md-3">
						         <?= $form->field($model, 'area')->dropdownList($areaList,
						                ['multiple'=>'multiple']
						            ); 
						        ?>
							</div>
							<div class="col-md-3">
						        <?= $form->field($model_office_timetable, 'day_and_time')->dropdownList($model->times,
						                ['multiple'=>'multiple']
						            ); 
						        ?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3">
								<div class="search-by-service-tag-time-area-submit">
									<?= Html::submitButton('ケンサク', ['class' => 'btn btn-default form-control search-by-service-tag-time-area-submit-button']) ?>
								</div>
							</div>
						</div>
				<?php ActiveForm::end() ?>
			</div>
			
		</div>

	</div>
</div>
