<?php use yii\helpers\Html;  ?>
<ul class="nav nav-tabs" id="myTabsz" role="tablist">
	<?php $x=0; ?>
	<?php foreach ($skills_names_array as $key => $skill): ?>
		<li role="presentation" class="">
		<?php if ($x==0): ?>
				<li role="presentation" class="active">
		<?php else: ?>
			<li role="presentation" class="">
		<?php endif; ?>
			<!-- <a href="xsxs">dcdc</a> -->
			<a href="#<?=$key?>" aria-controls="<?=$key?>" role="tab" data-toggle="tab">
				<?= $skill['skill_name'] ?>
			</a>
		</li>
	<?php $x++; ?>
	<?php endforeach ?>
	<li role="presentation" class="">
		 <?php echo Html::a('<span class="glyphicon glyphicon-plus"> </span> 編集する', ['office/update','id'=>$model->id], ['class' => 'btn btn-warning pull-right white-text btn-xs']) ?>
	</li>
</ul>
<div class="tab-content">
	<?php foreach ($skills_names_array as $key => $skill): ?>
		<div role="tabpanel" class="tab-pane" id="<?=$key ?>">
			<table class="table table-hover">
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
				    						'6:00-9:00 / 早朝', '9:00-10:00', '10:00-11:00', '11:00-12:00', '12:00-13:00','13:00-14:00', '14:00-15:00', '15:00-16:00', '16:00-17:00', '17:00-18:00', '18:00-21:00 / 夕方', '21:00-24:00 / 夜間', '24:00-6:00 / 夜中',
			    						);

				    	// but the $open_time array above needs to be in specific positions in the array.
				    	// these are the positions
				    	$time_open=array('1', '8', '15', '22', '29', '36', '43', '50', '57', '64', '71', '78', '85', '92', '99')
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
									if (array_key_exists($skill['skill_name'], $new_skilltimetable_array)):
								?>
								<?php

									$time_dash = $time.'-0';
									$time_dash2 = $time.'-1';
									$time_dash3 = $time.'-2';

								?>
								<?php
									if (	in_array($time_dash, $new_skilltimetable_array[$skill['skill_name']])  ||
											in_array($time_dash2, $new_skilltimetable_array[$skill['skill_name']]) ||
											in_array($time_dash3, $new_skilltimetable_array[$skill['skill_name']])):
								?>


								<?php

									// if the day and time is NOT in the array add the class hidden time.
									// this class will hide that element
									$hidden_time1 = 'visibile_time';
									$hidden_time2 = 'visibile_time';
									$hidden_time3 = 'visibile_time';

									if (!in_array($time_dash, $new_skilltimetable_array[$skill['skill_name']])) {
										$hidden_time1 = 'hidden_time';
									}

									if(!in_array($time_dash2, $new_skilltimetable_array[$skill['skill_name']])){
										$hidden_time2 = 'hidden_time';
									}

									if (!in_array($time_dash3, $new_skilltimetable_array[$skill['skill_name']])) {
										$hidden_time3 = 'hidden_time';
									}
								 ?>

								 <!-- When the icon is clicked, it will change using Ajax. This happens because the clicked icon get the 'hidden time' class appended to it and a different icon is shown. This is all done by JQuery in the custom.js file -->
								 <span id="not<?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time1 ?>">

									<i class="fa fa-close time_not_available <?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

								</span>
								<span id="yes<?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time2 ?>">

									<i class="fa fa-circle time_available <?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

								</span>
								<span id="maybe<?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" class="<?= $hidden_time3 ?>">

									<i class="fa fa-caret-up time_maybe <?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

								</span>

								<!-- If the time is not in the array, then display it here and give it an x icon. This means the time is not available. However when they click it, it will reload the page.  -->
								<?php else: ?>

									<span id="blank<?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id ?>" class="">

										<i class="fa fa-close time_blank <?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

									</span>

								<?php endif; ?>

								<?php else: ?>
									<span id="blank<?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id ?>" class="">

										<i class="fa fa-close time_blank <?php echo $skill['skill_name'].'-'.$time.'-'.Yii::$app->user->identity->id.'-'.$user_office_id ?>" aria-hidden="true"></i>

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
		</div> <!--#key-->
	<?php endforeach ?>
</div><!--./tab-content-->

