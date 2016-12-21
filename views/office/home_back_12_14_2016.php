<?php use yii\helpers\Html; ?>
<!--   Main    -->
<div class="">
    <div class="row">
        <h4>ケア・アップ　事業所様専用ページ</h4>
        <!-- ユーザIDにHTMLタグが含まれても良いようにエスケープする -->
        <h4>ようこそ さん</h4>
    </div>
    <div class="row">
    	<?php foreach ($user_offices as $key => $value): ?>

    		<div class="col s2">
	    		<?= Html::a( $value->Oname, $url = ['office/home','id'=>$value->id], $options = [] ) ?>
    		</div>
    		
    	<?php endforeach ?>
    	<div class="col s2">
			<?= Html::a( "+ Add", $url = ['office/create']) ?>
    		
    	</div>
    </div>

    <div class="row">
    	<div class="col s8">Office Information</div>
    	<div class="col s2">
			<?= Html::a( "Edit Office", $url = ['office/update','id'=>$user_office_id], $options = [] ) ?>

    	</div>
    	<div class="col s2">
			<?= Html::a( "View all", $url = ['office/index'], $options = [] ) ?>

    	</div>
    	<hr/>
    </div>

    <div class="row">
    
    	<div class="col s3">
		    <?= Html::img($model->imgname, ['alt'=>'Office Image', 'class'=>'materialboxed','width'=>'200']);?> 
    	</div>
    	<div class="col s3">
			<table class="table table-bordered">
				<tr>
					<td>電話番号(必須) Phone Number Required)</td>
					<td><?= $model->tel ?></td>
				</tr>
				<tr>
					<td>事業所名(必須)	Plant name (required)</td>
					<td><?= $model->Oname ?></td>
				</tr>
				<tr>
					<td>担当者名 Name of the person in charge</td>
					<td><?= $model->leader ?></td>
				</tr>
				<tr>
					<td>アピールポイント（200字程度） Appeal point (about 200 words)</td>
					<td><?= $model->apeal ?></td>
				</tr>
			</table>
    	</div>
    	<div class="col s3">
    		<table class="table table-bordered">
				<tr>
					<td>電話番号(必須) Phone Number Required)</td>
					<td><?= $model->tel ?></td>
				</tr>
				<tr>
					<td>事業所名(必須)	Plant name (required)</td>
					<td><?= $model->Oname ?></td>
				</tr>
				<tr>
					<td>担当者名 Name of the person in charge</td>
					<td><?= $model->leader ?></td>
				</tr>
				<tr>
					<td>アピールポイント（200字程度） Appeal point (about 200 words)</td>
					<td><?= $model->apeal ?></td>
				</tr>
			</table>
    	</div>
    	<div class="col s3">
    		<div class="rw">
	    		<div class="section">
		    		<div class="tagdiv">
		    			<h3>
		    				Services
		    			</h3>
		    			<div class="tagchecklist row">
		    			<div class="ow">

		    				<?php foreach ($Service_display as $key => $value): ?>


								<div class="tagchecklist-service-item <?= $value['id'] ?>">
									<div class="chip">
										<i class="close material-icons">close</i>
										<?= $value['service_name'] ?>
									</div>
								</div>

		    				<?php endforeach ?>
		    			</div>
		    			</div>
		    			<p>Choose from your Services</p>
		    			<div class="the-tagcloud">
		    				<?php 
		    					foreach ($model_service_name as $key => $value):?>
		    						
		    						<div class="tag-link <?=$user_office_id ?>"><?php echo $value['Sname']; ?>	</div>
		    					
		    				<?php endforeach; ?>
	                        <!-- <div id="other">Save Service</div> -->
		    			</div>

		    		</div>
	    		</div> <!--./section-->
	    		<div class="divider"></div> <!--./divider-->

	    		<div class="tagdiv">
	    			<h3>
	    				Appeal
	    			</h3>
	    			<div class="tagchecklist row">
	    				<?php foreach ($tags_display as $key => $value): ?>

	    					<!--  echo Html::a("<i class='fa fa-times' aria-hidden='true'></i>",
								[
									'tagsdisplay/delete','id'=>$value['id']
								], 
								['class' => '','data-method'=>'post']).$value['tag_name'] 
							?> -->

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
	    				<?php 
	    					foreach ($skills_names_array as $key => $value):?>
	    						
	    						<div class="tag-link-2 <?=$user_office_id ?>"><?php echo $value; ?>	</div>





	    					
	    				<?php endforeach; ?>
                        <!-- <div id="other">Save Service</div> -->
	    			</div>

	    		</div>
    		</div>
    	</div>

 

    </div> <!--./row-->

    <div class="row">
    		
    		<h2>OFFICE TIMATABLE</h2>
    		<table class="table table-bordered table-condensed">
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
										
									<?php endforeach ?>

							</tbody>
						</table>


    </div> <!-- ./row-->

    <div class="row">

    		<H2>SKILL TIMETABLE</H2>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">

				<?php foreach ($skills_names_array as $key => $skill): ?>
					<li role="presentation" class=""><a href="#<?= $skill ?>" aria-controls="<?= $skill ?>" role="tab" data-toggle="tab"><?= $skill ?></a></li>
				<?php endforeach ?>
				<!-- <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
				<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">

				<?php foreach ($skills_names_array as $key => $skill): ?>
					<div role="tabpanel" class="tab-pane active" id="<?= $skill ?>"><?= $skill ?>
						
						<table class="table table-bordered table-condensed">
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
					</div> <!--./tab-pane active-->
				<?php endforeach ?>
			</div> <!--tab-content-->
    </div> <!--./row-->

</div> <!--./container-->

