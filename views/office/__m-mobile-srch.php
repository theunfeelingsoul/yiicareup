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
<div class="visible-xs mobile-srch">

	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#m-advance-srch" aria-controls="m-advance-srch" role="tab" data-toggle="tab">その他の情報で検索</a></li>
		<li role="presentation"><a href="#m-office-name-srch" aria-controls="m-office-name-srch" role="tab" data-toggle="tab">事業所名で検索</a></li>
	</ul>

	<!-- Tab panes -->
	<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'options' => ['class' => ''],
		'action' => 'index.php?r=office/search',
		]) 
	?>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="m-advance-srch">
			<div class="m-advance-srch-buttons">
				<div class="">
					<button type="button" class="btn btn-default m-srch-menu m-service-srch-item" data-toggle="modal" data-target="#service-modal">サービス
					<span class="glyphicon glyphicon-menu-down"></span>
					</button>
					<div class="home-care">
						<?= $form->field($model_homecare, 'hmc_date')->label(false)->textInput(['id' => 'm-home-care-datepicker','placeholder'=>'Short Stay','readonly'=>true]) ?>
					</div>

					<button type="button" class="btn btn-default m-srch-menu m-skills-srch-item" data-toggle="modal" data-target="#skill-modal">アピールタグ
					<span class="glyphicon glyphicon-menu-down"></span>
					</button>
					<button type="button" class="btn btn-default m-srch-menu m-area-srch-item" data-toggle="modal" data-target="#area-modal">対応可能なエリア
					<span class="glyphicon glyphicon-menu-down"></span>
					</button>
					<button type="button" class="btn btn-default m-srch-menu m-office-srch-item" data-toggle="modal" data-target="#office-modal">曜日・時間
					<span class="glyphicon glyphicon-menu-down"></span>
					</button>
				</div>

				<div class="col-md-3 col-xs-12">
					
					<?= Html::submitButton('ケンサク', ['class' => 'btn btn-default form-control m-advance-srch-submit']) ?>
				</div>
			</div> <!--./col-xs-12-->
		</div> <!--./tab-pane-->
		<div role="tabpanel" class="tab-pane" id="m-office-name-srch">
			<div class="m-office-name-srch-from">
				<?php $form = ActiveForm::begin([
					// 'id' => 'm-office-name-srch-from',	
					'options' => ['class' => 'm-office-name-srch-from'],
					'action' => 'index.php?r=office/search',
					]) 
				?>
					<div class="col-xs-12">
						<?= $form->field($model, 'Oname')->textInput(['class' => 'form-control input-lg','placeholder'=>'事業所名'])->label(false) ?>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
				                <?= Html::submitButton($model->isNewRecord ? '事業所作成' : '更新', ['class' => 'btn btn-lg form-control btn-default m-name-srch-submit']) ?>
				        </div>
					</div>

				<?php ActiveForm::end() ?>
			</div>
		</div>
	</div>


	<!-- Modals -->
	<!-- Service modal -->
	<div class="modal fade" id="service-modal" tabindex="-1" role="dialog" aria-labelledby="service-modal-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="service-modal-label">サービス</h4>
				</div>
				<div class="modal-body">
					<?= $form->field($model, 'service')->dropdownList($serviceList,['prompt'=>'サービス','id'=>'m-office-service']
							)->label(false); 
							?>

				</div>
				<div class="modal-footer">	
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>


	<!-- Skill modal -->
	<div class="modal fade" id="skill-modal" tabindex="-1" role="dialog" aria-labelledby="skill-modal-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="skill-modal-label">アピールタグ</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						  <?php foreach ($skillList as $key => $value): ?>
						 	<div class="col-md-3 col-xs-6 m-srch-skill-checkbox">
							<?= Html::activeCheckbox($model, 'skills[]', ['class' => '','value'=>$key,'label'=>$value]);?>
						 	</div>
						 <?php endforeach ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>


	<!-- area modal -->
	<div class="modal fade" id="area-modal" tabindex="-1" role="dialog" aria-labelledby="area-modal-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="area-modal-label">対応可能なエリア</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						  <?php foreach ($areaList as $key => $value): ?>
						 	<div class="col-md-3 col-xs-6 m-srch-area-checkbox">
							<?= Html::activeCheckbox($model, 'area[]', ['class' => 'd','value'=>$key,'label'=>$value]);?>
						 	</div>
						 <?php endforeach ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>


	<!-- Office timetable modal -->
	<div class="modal fade" id="office-modal" tabindex="-1" role="dialog" aria-labelledby="office-modal-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="office-modal-label">曜日・時間</h4>
				</div>
				<div class="modal-body">
					  	<table class=" table-hover table-condensed table-responsive">
						    <thead>
						        <tr>
						            <th>時間帯</th>
						            <th>月</th>
						            <th>火</th>
						            <th>水</th>
						            <th>木</th>
						            <th>金</th>
						            <th>土</th>
						            <th>日</th>
						        </tr>
					        </thead>
						        <tbody>
							    	<?php
								    	// instatiate the variables to be used in the loops below
								    	$i=1; $k=0; $j=0;

								    	// This array keeps the times to be shown in the table.
								    	// a loop will be used to iterate through it
								    	$open_time = array(
								    						'6:00-9:00 / 早朝', '9:00-10:00', '10:00-11:00', '11:00-12:00', '12:00-13:00',
								    						'13:00-14:00', '14:00-15:00', '15:00-16:00', '16:00-17:00', '17:00-18:00', '18:00-21:00 / 夕方', '21:00-24:00 / 夜間', '24:00-6:00 / 夜中',
							    						);

								    	// but the $open_time array above needs to be in specific positions in the array.
								    	// these are the positions
								    	$time_open=array('1', '8', '15', '22', '29', '36', '43', '50', '57', '64', '71', '78', '85', '92', '99' )
									?>

						    	 	<!-- <tr> maybe put back -->
							    	 		<!-- Loop through the all the times. This array instatiated in the office model -->
											<?php foreach ($model->times as $key => $time): ?>
												<?php $key=$key+1; ?>

												<!-- The first <td> of every row should be the time of day. This loop makes sure this happens. -->
												<?php if (in_array($key, $time_open)):?>
													   <td><?=  $open_time[$j] ?></td>
												<?php $j++; ?>
												<?php endif; ?>

												<!-- Rest of the data -->
												<td>
											
												
												<?= Html::activeCheckbox($model_office_timetable, 'day_and_time[]', ['class' => 'd','value'=>$time,'label'=>$value,'label'=>false]);?>
													

											</td>

											<?php if ($key%7 == 0): ?>
												<!-- add the table row if the key is divisible by seven.
												     This is to make sure that the columns are always seven
												-->
											<tr>

											<?php endif ?>

											<?php $i++; ?>
											<?php $k++; ?>

										<?php endforeach; ?>

								</tbody>
						</table>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>
</div> <!--./mobile-srch-->