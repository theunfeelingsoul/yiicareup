<?php use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;?>

<div class="container">
	<div class="card">
		<div class="card-content">
			<span class="card-title"></span>
				<div class="row center">
					<!-- office search modal -->
					<div class="col s12 m6 l4">
						<!-- Modal Trigger -->
						<a class="waves-effect waves-light" href="#modal-office">
							<?= Html::img('img/find/find_1.png', ['alt'=>'Service', 'class'=>'responsive-img','width'=>'300']);?>
						</a>

						<!-- Modal Structure -->
						<div id="modal-office" class="modal modal-fixed-footer">
							<div class="modal-content">
								<h4>事業所名でケンサク</h4>
								<!-- <h6>Office name</h6> -->

									<?php $form = ActiveForm::begin([
										'options' => ['enctype' => 'multipart/form-data'],
										'errorCssClass' => 'errord',
										// 'method'=>'get',
										'action' => 'index.php?r=office/officesearch',
									]); ?>

									<?= $form->errorSummary($model) ?>

									<div class="row">
										<div class="input-field col s12">
							                <?= $form->field($model, 'Oname')->textInput(['maxlength' => true]) ?>
							            </div>
						            </div>

							</div>
							<div class="modal-footer">
								<div class="col s6">
									<?= Html::submitButton('ケンサク', ['class' => 'waves-effect left waves-teal btn-flat']) ?>
								</div>
								<div class="col s6">
									<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">閉じる</a>
								</div>

							</div>
							<?php ActiveForm::end(); ?>
						</div>
					</div>

					<!-- service search modal -->
					<div class="col s12 m6 l4">
						<!-- Modal Trigger -->
						<a class="modal-trigger waves-effect waves-light" href="#modal1">
							<?= Html::img('img/find/find_2.png', ['alt'=>'Service', 'class'=>'responsive-img','width'=>'300']);?>
						</a>

						<!-- Modal Structure -->
						<div id="modal1" class="modal modal-fixed-footer">
							<?= Html::beginForm(['office/servicesearch'], 'post') ?>
								<div class="modal-content">
									<h4>サービスでケンサク</h4>
									<div class="row">
										<?php foreach ($sgroup_and_services as $key => $value): ?>
											<div class="input-field col s12">
												<?php foreach ($value as $key => $v): ?>
													<div class="row">
														<?= $key ?>
													</div>
													<?php foreach ($v as $key => $vz): ?>
														<div class="row">
															<input type="checkbox" name="<?=$vz['Sname'] ?>" id="<?=$vz['Sname'] ?>"/>
															 <label for="<?=$vz['Sname'] ?>"><?=$vz['Sname'] ?></label>
														 </div>
													<?php endforeach; ?>
												<?php endforeach; ?>
											</div>
										<?php endforeach; ?>
									</div><!--./row-->
								</div><!--./modal-content-->
								<div class="modal-footer">
									<div class="col s6">
										<?= Html::submitButton('ケンサク', ['class' => 'waves-effect left waves-teal btn-flat']) ?>
									</div>
									<div class="col s6">
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">閉じる</a>
									</div>

								</div>
							<?= Html::endForm() ?>
						</div>
					</div>

					<!-- Location search modal -->
					<div class="col s12 m6 l4">
						<!-- Modal Trigger -->
						<a class="modal-trigger waves-effect waves-light" href="#modal_location">
							<?= Html::img('img/find/find_3.png', ['alt'=>'Service', 'class'=>'responsive-img','width'=>'300']);?>
						</a>

						<!-- Modal Structure -->
						<div id="modal_location" class="modal modal-fixed-footer">
							<?= Html::beginForm(['office/locationsearch'], 'post') ?>
								<div class="modal-content">
									<h4>地域でケンサク</h4>
									<div class="row">
										<?php foreach ($locations as $key => $value): ?>
											<div class="input-field col s12">
												<?php foreach ($value as $key => $v): ?>
													<div class="row">
														<?= $key ?>
													</div>
													<?php foreach ($v as $key => $vz): ?>
														<div class="row">
															<input type="checkbox" name="<?=$vz['Cid'] ?>" id="<?=$vz['Cname'] ?>"/>
															 <label for="<?=$vz['Cname'] ?>"><?=$vz['Cname'] ?></label>
														 </div>
													<?php endforeach; ?>
												<?php endforeach; ?>
											</div>
										<?php endforeach; ?>
									</div><!--./row-->
								</div><!--./modal-content-->
								<div class="modal-footer">
									<div class="col s6">
										<?= Html::submitButton('ケンサク', ['class' => 'waves-effect left waves-teal btn-flat']) ?>
									</div>
									<div class="col s6">
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">閉じる</a>
									</div>

								</div>
							<?= Html::endForm() ?>
						</div>
					</div>

					<!-- Time table search modal -->
					<div class="col s12 m6 l4">
						<!-- Modal Trigger -->
						<a class="modal-trigger waves-effect waves-light" href="#modal_office_timetable">
							<?= Html::img('img/find/find_4.png', ['alt'=>'Service', 'class'=>'responsive-img','width'=>'300']);?>
						</a>

						<!-- Modal Structure -->
						<div id="modal_office_timetable" class="modal modal-fixed-footer">
							<?= Html::beginForm(['office/officetimetablesearch'], 'post') ?>
								<div class="modal-content">
									<h4>空き時間でケンサク</h4>
									<div class="row">
										<!-- <span class="card-title">OFFICE TIMETABLE</span> -->
										<table class="bordered highlight responsive-table">
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
											    	$open_time = array('6:00-9:00 / 早朝', '9:00-10:00', '10:00-11:00', '11:00-12:00', '12:00-13:00', '13:00-14:00', '14:00-15:00', '15:00-16:00', '16:00-17:00', '17:00-18:00', '18:00-19:00', '18:00-21:00 / 夕方', '21:00-24:00 / 夜間', '24:00-6:00 / 夜中');
											    	// but the $open_time array above needs to be in specific positions in the array.
											    	// these are the positions
											    	$time_open=array('1', '8', '15', '22', '29', '36', '43', '50', '57', '64', '71', '78', '85', '92','99')
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
															<div class="input-field col s12">
																<!-- <div class="row"> -->
																	<input type="checkbox" name="<?=$time ?>" id="<?=$time ?>"/>
																	<label for="<?=$time ?>"></label>
																<!-- </div> -->
															</div>
														</td>

														<?php if ($key%7 == 0): ?>
															<!-- add the table row if the key is divisible by seven.
															     This is to make sure that the columns are always seven
															-->
															</tr><tr>

														<?php endif; ?>

														<?php $i++; ?>
														<?php $k++; ?>

													<?php endforeach; ?>

											</tbody>
										</table>
									</div><!--./row-->
								</div><!--./modal-content-->
								<div class="modal-footer">
									<div class="col s6">
										<?= Html::submitButton('ケンサク', ['class' => 'waves-effect left waves-teal btn-flat']) ?>
									</div>
									<div class="col s6">
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">閉じる</a>
									</div>

								</div>
							<?= Html::endForm() ?>
						</div>
					</div>

					<!-- Tag search modal -->
					<div class="col s12 m6 l4">
						<!-- Modal Trigger -->
						<a class="modal-trigger waves-effect waves-light" href="#modal3">
							<?= Html::img('img/find/find_5.png', ['alt'=>'Service', 'class'=>'responsive-img','width'=>'300']);?>
						</a>

						<!-- Modal Structure -->
						<div id="modal3" class="modal modal-fixed-footer">
							<?= Html::beginForm(['office/tagsearch'], 'post') ?>
								<div class="modal-content">
									<h4>タグで絞り込み</h4>
									<div class="row">
										<?php foreach ($skgroup_and_tags as $key => $value): ?>
											<div class="input-field col s12">
												<?php foreach ($value as $key => $v): ?>
													<div class="row">
														<?= $key ?>
													</div>
													<?php foreach ($v as $key => $vz): ?>
														<div class="row">
															<input type="checkbox" name="<?=$vz['Skname'] ?>" id="<?=$vz['Skname'] ?>"/>
															 <label for="<?=$vz['Skname'] ?>"><?=$vz['Skname'] ?></label>
														 </div>
													<?php endforeach; ?>
												<?php endforeach; ?>
											</div>
										<?php endforeach; ?>
									</div><!--./row-->
								</div><!--./modal-content-->
								<div class="modal-footer">
									<div class="col s6">
										<?= Html::submitButton('ケンサク', ['class' => 'waves-effect left waves-teal btn-flat']) ?>
									</div>
									<div class="col s6">
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">閉じる</a>
									</div>

								</div>
							<?= Html::endForm() ?>
						</div>
					</div>

					<!-- search result bottom modal -->
					<div class="col s12 m6 l4">
						<!-- Modal Trigger -->
					  <!-- <a class="waves-effect waves-light btn" href="#modal2">Modal Bottom</a> -->
					  <div id="modal2" class="modal bottom-sheet">
					    <div class="modal-content">
					      <h4>ケンサク結果</h4>
					      <div id ="mydiv" class="<?=$modalphp ?>"></div>
					      <ul class="collection">
					      		<?php if ($search_results): ?>
						      		<?php foreach ($search_results as $key => $value): ?>
										<li class="collection-item avatar">
											<!-- <img src="http://materializecss.com/images/yuna.jpg" alt="" class="circle"> -->
											<?= Html::img($value['img'], ['alt'=>'some', 'class'=>'responsive-img circle','width'=>'']);?>
											<span class="title"><?=$value['oname']; ?></span>
											<p><?=$value['services']; ?></p>
											<p><?=$value['appeal']; ?></p>
											<p>
												<a href="index.php?r=office/view&id=<?=$value['id']?>" class=" modal-action modal-close waves-effect waves-green btn">
													<i class="material-icons right">
														send
													</i>
													Details
												</a>
											</p>
											<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
										</li>
						      		<?php endforeach ?>
					      		<?php else: ?>
					      			<?=$model->msg_empty_search; ?>
					      		<?php endif; ?>

					            </ul>
					    </div>
					    <div class="modal-footer">
					      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">閉じる</a>

					    </div>
					  </div>
					</div>
				</div> <!--./row-->
		</div>
	</div>
</div>

