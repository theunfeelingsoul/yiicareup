<?php use yii\helpers\Html; ?>

<?php 

$this->title = 'Update Office: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->Oname; 

?>
<!-- </div> -->


<!--   Main    -->
<div class="">
    
    <!-- OFFICE INFO HEADER -->
	<div class="row">
		<!-- <div class="divider"></div> -->
		<div id="office-info-header">
			<div class="col s12 m12 l4">
				<div class="office-name">
					<!-- <h3> -->
					<?php echo $model->Oname ?>
					<!-- </h3> -->
				</div>
			</div>

			<div class="col s12 m12 l8">
				<?= Html::a( "Edit", $url = ['office/update','id'=>$user_office_id], $options = ['class'=>'waves-effect waves-light btn col s12 l2'] ) ?>

	    	</div>

    	</div>
	</div>

	<div class="divider"></div>
    <!-- <div class="divider"></div> -->

    <!-- list the offices -->
    

    <div class="divider"></div>


	<!-- OFFICE INFORMATION -->
	<div class="row">
		<div class="col l8 m12 s12">

		<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-content">
						<span class="card-title">Offices</span>
						<p>
						<ul class="collection">
							<?php 

					    		// get the id from the current URL
						    	// if it does not exists use the id from the model provided

					    		if (isset($_GET['id'])) {
					    			$office_id=$_GET['id'];
					    		}else{
					    			$office_id = $model->id;
					    		}

					    	 ?>
					    	<?php foreach ($user_offices as $key => $value): ?>
					    		<?php if ($value->id == $office_id ): ?>
							    		<li class="collection-item">
								    		<?= Html::a( $value->Oname, $url = ['office/home','id'=>$value->id], $options = ['class'=>'office-menu-list-item-active'] ) ?>
							    		</li>

					    		<?php else: ?>
							    		<li class="collection-item">
								    		<?= Html::a( $value->Oname, $url = ['office/home','id'=>$value->id], $options = ['class'=>''] ) ?>
							    		</li>
						    	<?php endif; ?>
					    		
					    	<?php endforeach ?>
					    </ul>
						</p>
					</div>
					<div class="card-action">
						<a href="#">View all</a>
						<a href="#">Add an office</a>
					</div>
				</div>
			</div>
		</div>

			<!-- OFFICE INFORMATION -->
			<!-- <div class="section"> -->
				<div class="">
					<div class="card">
						<div class="card-content">
							<span class="card-title">Office Information</span>
							<div class="row">
								<!-- <div class="col s12"> -->
									<table class="bordered highlight office-home-info-table-left responsive-table">
										<thead>
											<th>Position</th>
											<th>Name</th>
											<th>Value</th>
										</thead>
										<tbody>
											<tr>
												<!-- <td>電話番号(必須) Phone Number Required)</td> -->
												<td>1</td>
												<td>電話番号(必須)</td>
												<td><?= $model->tel ?></td>
											</tr>
											<tr>
												<!-- <td>事業所名(必須)	Plant name (required)</td> -->
												<td>2</td>
												<td>事業所名(必須)</td>
												<td><?= $model->Oname ?></td>
											</tr>
											<tr>
												<td>3</td>
												<td>担当者名</td>
												<!-- <td>担当者名 Name of the person in charge</td> -->
												<td><?= $model->leader ?></td>
											</tr>
											<tr>
												<td>4</td>
												<td>アピールポイント（200字程度）</td>
												<!-- <td>アピールポイント（200字程度） Appeal point (about 200 words)</td> -->
												<td><?= $model->apeal ?></td>
											</tr>

											<tr>
												<td>5</td>
												<td>電話番号(必須)</td>
												<!-- <td>電話番号(必須) Phone Number Required)</td> -->
												<td><?= $model->tel ?></td>
											</tr>
											<tr>
												<td>6</td>
												<td>事業所名(必須)</td>
												<!-- <td>事業所名(必須)	Plant name (required)</td> -->
												<td><?= $model->Oname ?></td>
											</tr>
											<tr>
												<td>7</td>
												<td>担当者名</td>
												<!-- <td>担当者名 Name of the person in charge</td> -->
												<td><?= $model->leader ?></td>
											</tr>
											<tr>
												<td>8</td>
												<td>アピールポイント（200字程度）</td>
												<!-- <td>アピールポイント（200字程度） Appeal point (about 200 words)</td> -->
												<td><?= $model->apeal ?></td>
											</tr>
										</tbody>

									</table>
								<!-- </div> -->
								<!-- <div class="col s12 l6 m12">
									<table class="bordered highlight office-home-info-table-right">

										<tr>
											<td>電話番号(必須)</td>
											<td>電話番号(必須) Phone Number Required)</td> 
											<td><$model->tel ?></td>
										</tr>
										<tr>
											<td>事業所名(必須)</td>
											<td>事業所名(必須)	Plant name (required)</td> 
											<td> $model->Oname ?></td>
										</tr>
										<tr>
											<td>担当者名</td>
											<td>担当者名 Name of the person in charge</td> 
											<td> $model->leader ?></td>
										</tr>
										<tr>
											<td>アピールポイント（200字程度）</td>
											<td>アピールポイント（200字程度） Appeal point (about 200 words)</td> 
											<td> $model->apeal ?></td>
										</tr>
									</table>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			<!-- </div> -->

			<div class="divider"></div>

			<!-- OFFICE AND SKILL TIMETABLE -->
			<!-- <div class="section"> -->
				<div class="row">
					<!-- OFFICE TIMETABLE -->
					<div class="col s12 l6 ">
						<div class="card">
							<div class="card-content">
								<span class="card-title">OFFICE TIMETABLE</span>
								<table class="bordered highlight responsive-table">
									<thead>
								    	<tr>
						                    <th>d</th>
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
									    						'9:00', '10:00', '11:00', '12:00', 
									    						'13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'
								    						);

									    	// but the $open_time array above needs to be in specific positions in the array.
									    	// these are the positions
									    	$time_open=array('1', '8', '15', '22', '29', '36', '43', '50', '57', '64', '71', '78')
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
												<!-- 	<
														// use array_key_exists for associative arrays instead of in_array which works with normal arrays
														if (array_key_exists($skill, $new_skilltimetable_array)): 
													?> -->		
													<?php 

														$time_dash = $time.'-0';
														$time_dash2 = $time.'-1';
														$time_dash3 = $time.'-2';

													?>
													<?php 
														if (	in_array($time_dash, $office_timetable)  || 
																in_array($time_dash2, $office_timetable) || 
																in_array($time_dash3, $office_timetable)): 
													?>


													<?php 

														
														// if the day and time is NOT in the array add the class hidden time.
														// this class will hide that element
														$hidden_time1 = 'visibile_time';
														$hidden_time2 = 'visibile_time';
														$hidden_time3 = 'visibile_time';

														if (!in_array($time_dash, $office_timetable)) {
															$hidden_time1 = 'hidden_time';
														}

														if(!in_array($time_dash2, $office_timetable)){
															$hidden_time2 = 'hidden_time';
														}

														if (!in_array($time_dash3, $office_timetable)) {
															$hidden_time3 = 'hidden_time';
														}

													 ?>

													 <!-- When the icon is clicked, it will change using Ajax. This happens because the clicked icon get the 'hidden time' class appended to it and a different icon is shown. This is all done by JQuery in the custom.js file -->
													 <span id="not<?php echo $time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time1 ?>">

														<i class="fa fa-close office_time_not_available <?php echo $time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

													</span>
													<span id="yes<?php echo $time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time2 ?>">

														<i class="fa fa-circle office_time_available <?php echo $time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

													</span>
													<span id="maybe<?php echo $time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time3 ?>">

														<i class="fa fa-caret-up office_time_maybe <?php echo $time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

													</span>
														
													<!-- If the time is not in the array, then display it here and give it an x icon. This means the time is not available. However when they click it, it will reload the page.  -->
													<?php else: ?>

														<span id="blank <?php echo $time.'-'.Yii::$app->user->identity->id ?>" class="">

															<i class="fa fa-close office_time_blank <?php echo $time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

														</span>

													<?php endif; ?>

													

												</td>

												<?php if ($key%7 == 0): ?>
													<!-- add the table row if the key is divisible by seven. 
													     This is to make sure that the columns are always seven 
													-->
													</tr><tr>
													
												<?php endif ?>
												
												<?php $i++; ?>
												<?php $k++; ?>
												
											<?php endforeach; ?>

									</tbody>
								</table>
							</div>
							<!-- <div class="card-action">
								<a href="#">This is a link</a>
								<a href="#">This is a link</a>
							</div> -->
						</div>
					</div>

					<!-- SKILL TIMETABLE -->
					<div class="col s12 l6 ">
						<div class="card">
							<div class="card-content">
								<span class="card-title responsive-table">SKILLS TIMETABLE</span>
								<div class="row">
									<div class="col s12">
										<ul class="tabs tabs-fixed-width ">
											<?php foreach ($skills_names_array as $key => $skill): ?>
												<li class="tab col s6">
													<a href="#<?=$key?>">
														<?= $skill ?>
													</a>
												</li>

												<!-- <li role="presentation" class=""><a href="#<?= $skill ?>" aria-controls="<?= $skill ?>" role="tab" data-toggle="tab"><?= $skill ?></a></li> -->

											<?php endforeach ?>
										</ul>
									</div>
								</div>
								<div class="row">
								<?php foreach ($skills_names_array as $key => $skill): ?>
									<div id="<?= $key ?>" class="">
										<table class="highlight responsive-table">
											<thead>
										    	<tr>
								                    <th></th>
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
											    						'9:00', '10:00', '11:00', '12:00', 
											    						'13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'
										    						);

											    	// but the $open_time array above needs to be in specific positions in the array.
											    	// these are the positions
											    	$time_open=array('1', '8', '15', '22', '29', '36', '43', '50', '57', '64', '71', '78')
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
															<?php 
																// use array_key_exists for associative arrays instead of in_array which works with normal arrays
																if (array_key_exists($skill, $new_skilltimetable_array)): 
															?>		
															<?php 

																$time_dash = $time.'-0';
																$time_dash2 = $time.'-1';
																$time_dash3 = $time.'-2';

															?>
															<?php 
																if (	in_array($time_dash, $new_skilltimetable_array[$skill])  || 
																		in_array($time_dash2, $new_skilltimetable_array[$skill]) || 
																		in_array($time_dash3, $new_skilltimetable_array[$skill])): 
															?>


															<?php 

																// if the day and time is NOT in the array add the class hidden time.
																// this class will hide that element
																$hidden_time1 = 'visibile_time';
																$hidden_time2 = 'visibile_time';
																$hidden_time3 = 'visibile_time';

																if (!in_array($time_dash, $new_skilltimetable_array[$skill])) {
																	$hidden_time1 = 'hidden_time';
																}

																if(!in_array($time_dash2, $new_skilltimetable_array[$skill])){
																	$hidden_time2 = 'hidden_time';
																}

																if (!in_array($time_dash3, $new_skilltimetable_array[$skill])) {
																	$hidden_time3 = 'hidden_time';
																}
															 ?>

															 <!-- When the icon is clicked, it will change using Ajax. This happens because the clicked icon get the 'hidden time' class appended to it and a different icon is shown. This is all done by JQuery in the custom.js file -->
															 <span id="not<?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time1 ?>">

																<i class="fa fa-close time_not_available <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

															</span>
															<span id="yes<?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time2 ?>">

																<i class="fa fa-circle time_available <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

															</span>
															<span id="maybe<?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time3 ?>">

																<i class="fa fa-caret-up time_maybe <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

															</span>
																
															<!-- If the time is not in the array, then display it here and give it an x icon. This means the time is not available. However when they click it, it will reload the page.  -->
															<?php else: ?>

																<span id="blank<?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>" class="">

																	<i class="fa fa-close time_blank <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

																</span>

															<?php endif; ?>

															<?php else: ?>
																<span id="blank<?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>" class="">

																	<i class="fa fa-close time_blank <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

																	</span>
															<?php endif ?>

														</td>

														<?php if ($key%7 == 0): ?>
															<!-- add the table row if the key is divisible by seven. 
															     This is to make sure that the columns are always seven 
															-->
															</tr><tr>
															
														<?php endif ?>
														
														<?php $i++; ?>
														<?php $k++; ?>
														
													<?php endforeach ?>

											</tbody>
										</table>
									</div> <!--tab-content-->
								<?php endforeach ?>
								</div>
							</div>
							<!-- <div class="card-action">
								<a href="#">This is a link</a>
								<a href="#">This is a link</a>
							</div> -->
						</div>
					</div>
				</div>
			<!-- </div> -->
		</div>

		<!-- SERVICE AND APPEAL TAGS -->
		<div class="col l4 m12 s12">

		<!-- LIST OF OFFICES-->
			<div class="row">
				<div class="col s12">
					<div class="card">
						<div class="card-content">
							<span class="card-title">Offices</span>
							<p>
							<ul class="collection">
								<?php 

						    		// get the id from the current URL
							    	// if it does not exists use the id from the model provided

						    		if (isset($_GET['id'])) {
						    			$office_id=$_GET['id'];
						    		}else{
						    			$office_id = $model->id;
						    		}

						    	 ?>
						    	<?php foreach ($user_offices as $key => $value): ?>
						    		<?php if ($value->id == $office_id ): ?>
								    		<li class="collection-item">
									    		<?= Html::a( $value->Oname, $url = ['office/home','id'=>$value->id], $options = ['class'=>'office-menu-list-item-active'] ) ?>
								    		</li>

						    		<?php else: ?>
								    		<li class="collection-item">
									    		<?= Html::a( $value->Oname, $url = ['office/home','id'=>$value->id], $options = ['class'=>''] ) ?>
								    		</li>
							    	<?php endif; ?>
						    		
						    	<?php endforeach ?>
						    </ul>
							</p>
						</div>
						<div class="card-action">
							<a href="#">View all</a>
							<a href="#">Add an office</a>
						</div>
					</div>
				</div>
			</div>


			<!-- SERIVCE TAGS-->
			<div class="row">
		    	<div class="col s12">
					<div class="">
						<div class="col s12">
							<div class="card">
								<div class="card-content">
									<span class="card-title">Services</span>
									<div class="section">
							    		<div class="tagdiv">
							    			<div class="tagchecklist-service row">
							    			<!-- <div class="ow"> -->

							    				<?php foreach ($Service_display as $key => $value): ?>


													<div class="tagchecklist-service-item <?= $value['id'] ?>">
														<div class="chip">
															<i class="close material-icons">close</i>
															<?= $value['service_name'] ?>
														</div>
													</div>

							    				<?php endforeach ?>
							    			<!-- </div> -->
							    			</div>
							    			<p>Choose from your Services</p>
							    			<div class="the-tagcloud">
							    				 <ul class="collection">
							    				<?php 
							    					foreach ($model_service_name as $key => $value):?>
							    						<li class="collection-item">
								    						<div class="tag-link <?=$user_office_id ?>">
								    							<?php echo $value['Sname']; ?>	
								    						</div>
							    						</li>
							    					
							    				<?php endforeach; ?>
							    				</ul>
						                        <!-- <div id="other">Save Service</div> -->
							    			</div>

							    		</div>
						    		</div> <!--./section-->
						    		<div class="divider"></div> <!--./divider-->
								</div>
								<!-- <div class="card-action">
									<a href="#">This is a link</a>
									<a href="#">This is a link</a>
								</div> -->
							</div>
						</div>
					</div> <!--./row-->
		    	</div>
	    	</div>

	    	<!-- APPEAL TAGS-->
			<div class="row">
		    	<div class="col s12">
					<div class="">
						<div class="col s12">
							<div class="card">
								<div class="card-content">
									<span class="card-title">Appeal</span>
						    		<div class="tagdiv">
						    			<div class="tagchecklist-tag row">
						    				<?php foreach ($tags_display as $key => $value): ?>

												<div class="tagchecklist-tag-item <?= $value['id'] ?>">
													<div class="chip">
														<i class="close material-icons">close</i>
														<?= $value['tag_name'] ?>
													</div>
												</div>
						    				<?php endforeach ?>
						    			</div>
						    			<p>Choose from your Tags</p>
						    			<div class="the-tagcloud">
							    			<ul class="collection">
							    				<?php 
							    					foreach ($skills_names_array as $key => $value):?>
							    						<li class="collection-item">
								    						<div class="tag-link-2 <?=$user_office_id ?>">
								    							<?php echo $value; ?>	
								    						</div>
							    						</li>
							    				<?php endforeach; ?>
						    				</ul>
						                        <!-- <div id="other">Save Service</div> -->
						    			</div>

						    		</div>
								</div>
								<!-- <div class="card-action">
									<a href="#">This is a link</a>
									<a href="#">This is a link</a>
								</div> -->
							</div>
						</div>
					</div> <!--./row-->
		    	</div>
			</div>

			<!-- OFFICE IMAGE -->
			<div class="row">
				<!-- OFFICE IMAGE -->
		    	<div class="col s12">
					<div class="">
						<div class="col s12	">
							<div class="card">
								<div class="card-content">
									<span class="card-title">Office Image</span>
				            
									<p>
										<?= Html::img($model->imgname, ['alt'=>'Office Image', 'class'=>'responsive-img','width'=>'']);?>
										
										</p>
								</div>
								<!-- <div class="card-action">
								<a href="#">This is a link</a>
								<a href="#">This is a link</a>
								</div> -->
							</div>
						</div>
					</div>
		    	</div> <!--col s3-->
			</div>
		</div>
	</div>


    <div class="row">
	    	
    </div> <!--./row-->

	

	

</div> <!--./container-->

