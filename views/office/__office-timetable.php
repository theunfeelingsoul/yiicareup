<div class="card" id="offtime">
	<div class="card-content">
		<!-- <span class="card-title">OFFICE TIMETABLE</span> -->
		<table class="bordered highlight responsive-table">
			<thead>
		    	<tr>
                    <th>Time</th>
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