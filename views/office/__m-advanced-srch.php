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
<div class="desktop-srch hidden-xs">
  <!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<!-- advance search -->
			<a href="#advance-search" aria-controls="advance-search" role="tab" data-toggle="tab">その他の情報で検索
			</a>
		</li>
		<li role="presentation"><a href="#office-search" aria-controls="office-search" role="tab" data-toggle="tab">事業所名で検索</a></li>
	</ul>

  <!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="advance-search">

			<?php $form = ActiveForm::begin([
				'id' => 'login-form',
				'options' => ['class' => ''],
				'action' => 'index.php?r=office/search',
				]) 
			?>
				<div class="col-md-12c">
					<div class="srch-menu col-md-2 col-xs-12">
						<div class="srch-menu service-srch-menu-item ">
							<?= $form->field($model, 'service')->dropdownList($serviceList,['prompt'=>'サービス']
							)->label(false); 
							?>
						</div>
					</div>
					<div class="srch-menu col-md-2 col-xs-6">
						<div class="srch-menu-item skill-srch-menu-item">
							アピールタグ
							<span class="glyphicon glyphicon-menu-down"></span>
						</div>
					</div>
					<div class="srch-menu col-md-2 col-xs-6">
						<div class="srch-menu-item area-srch-menu-item">
							対応可能なエリア
							<span class="glyphicon glyphicon-menu-down"></span>
						</div>
					</div>
					<div class="srch-menu col-md-2 col-xs-12">
						<div class="srch-menu-item office-srch-menu-item">
							曜日・時間
							<span class="glyphicon glyphicon-menu-down"></span>
						</div>
					</div>

					<div class="col-md-3">
						
						<?= Html::submitButton('ケンサク', ['class' => 'btn btn-default form-control search-by-service-tag-time-area-submit-button']) ?>
					</div>

					
				</div>
				<div class="col-md-12">
					<!-- <div class="skill-srch-menu-item-panel"> -->

					<div class="col-md-10" id="skill-srch-menu-item-input-box">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">アピールタグ</div>
								<div class="col-md-6">
									<span class="pull-right glyphicon glyphicon-remove skill-srch-menu-item-close"></span>
								</div>
							</div>
							<hr>
							 <?php foreach ($skillList as $key => $value): ?>
							 	<div class="col-md-3">
								<?= Html::activeCheckbox($model, 'skills[]', ['class' => 'skill-srch-menu-checkbox','value'=>$key,'label'=>$value]);?>
							 	</div>
							 <?php endforeach ?>

						</div><!--./row-->
						<div class="col-md-12">
							<div class="">
								<button class="btn btn-default skill-srch-menu-item-close srch-menu-item-close">閉じる</button>
								<!-- <a href="" class="skill-srch-menu-item-close btn btn-default">Close</a> -->
							</div>
						</div>
					</div><!--./skill-srch-menu-item-panel-->

					<div class="col-md-10" id="area-srch-menu-item-input-box">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">対応可能なエリア</div>
								<div class="col-md-6">
									<span class="pull-right glyphicon glyphicon-remove area-srch-menu-item-close"></span>
								</div>
							</div>
							<hr>
							 <?php foreach ($areaList as $key => $value): ?>
							 	<div class="col-md-3">
								<?= Html::activeCheckbox($model, 'area[]', ['class' => 'area-srch-menu-checkbox','value'=>$key,'label'=>$value]);?>
							 	</div>
							 <?php endforeach ?>

						</div><!--./row-->
						<div class="col-md-12">
							<div class="">
								<div class="btn btn-default area-srch-menu-item-close srch-menu-item-close">閉じる</div>
								<!-- <a href="" class="skill-srch-menu-item-close btn btn-default">Close</a> -->
								
							</div>
						</div>
					</div><!--./skill-srch-menu-item-panel-->

					<div class="col-md-4" id="office-srch-menu-item-input-box">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">曜日・時間</div>
								<div class="col-md-6">
									<span class="pull-right glyphicon glyphicon-remove office-srch-menu-item-close"></span>
								</div>
							</div>
							<hr>
							<table class="table-hover table-responsive table-condensed">
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

						</div><!--./row-->
						<div class="col-md-12">
							<div class="">
								<div class="btn btn-default office-srch-menu-item-close srch-menu-item-close">閉じる</div>
								<!-- <a href="" class="skill-srch-menu-item-close btn btn-default">Close</a> -->
								
							</div>
						</div>
					</div><!--./skill-srch-menu-item-panel-->
				</div> <!--./row-->

			<?php ActiveForm::end() ?>
		</div>

		<div role="tabpanel" class="tab-pane" id="office-search">
			<?php $form = ActiveForm::begin([
				'id' => 'login-form',
				'options' => ['class' => ''],
				'action' => 'index.php?r=office/mocksearch',
				]) 
			?>
				<div class="col-md-3">
					<?= $form->field($model, 'Oname')->textInput(['maxlength' => true])->label(false) ?>
				</div>
				<div class="col-md-9">
					<div class="form-group">
			                <?= Html::submitButton($model->isNewRecord ? '事業所作成' : '更新', ['class' => $model->isNewRecord ? 'btn btn-default srch-submit' : 'btn btn-default m-srch-submit']) ?>
			        </div>
				</div>

			<?php ActiveForm::end() ?>
		</div>
	</div> <!--./tab-content-->




	<hr>
</div>