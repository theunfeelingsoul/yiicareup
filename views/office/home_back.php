<?php use yii\helpers\Html; ?>
<!--   Main    -->
<div class="container">
    <div class="row">
        <h1>ケア・アップ　事業所様専用ページ</h1>
        <!-- ユーザIDにHTMLタグが含まれても良いようにエスケープする -->
        <h4>ようこそ さん</h4>
    </div>
    <div class="row">
    	<?php foreach ($user_offices as $key => $value): ?>

    		<div class="col-md-2">
	    		<?= Html::a( $value->Oname, $url = ['office/home','id'=>$value->id], $options = [] ) ?>
    		</div>
    		
    	<?php endforeach ?>
    	<div class="col-md-2">
			<?= Html::a( "+", $url = ['office/create']) ?>
    		
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-9">Office Information</div>
    	<div class="col-md-3">
			<?= Html::a( "Edit Office", $url = ['office/update','id'=>$value->id], $options = [] ) ?>

    	</div>
    	<hr/>
    </div>

    <div class="row">
    
    	<div class="col-md-3">
		    <?= Html::img($model->imgname, ['alt'=>'some', 'class'=>'thing','width'=>'200']);?> 
    	</div>
    	<div class="col-md-3">
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
    	<div class="col-md-3">
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
    	<div class="col-md-3">
    		<div class="rw">
	    		<div class="tagdiv">
	    			<h3>
	    				Services
	    			</h3>
	    			<div class="tagchecklist">
	    				<?php foreach ($Service_display as $key => $value): ?>

	    					<?php echo Html::a("<i class='fa fa-times' aria-hidden='true'></i>",
								[
									'servicedisplay/delete','id'=>$value['id']
								], 
								['class' => '','data-method'=>'post']).$value['service_name'] 
							?>

	    				<?php endforeach ?>
	    			</div>
	    			<p>Choose from your Services</p>
	    			<div class="the-tagcloud">
	    				<?php 
	    					foreach ($model_service_name as $key => $value):?>
	    						
	    						<div class="tag-link"><?php echo $value['Sname']; ?>	</div>
	    					
	    				<?php endforeach; ?>
                        <!-- <div id="other">Save Service</div> -->
	    			</div>

	    		</div>

	    		<div class="tagdiv">
	    			<h3>
	    				Appeal
	    			</h3>
	    			<div class="tagchecklist">
	    				<?php foreach ($tags_display as $key => $value): ?>

	    					<?php echo Html::a("<i class='fa fa-times' aria-hidden='true'></i>",
								[
									'tagsdisplay/delete','id'=>$value['id']
								], 
								['class' => '','data-method'=>'post']).$value['tag_name'] 
							?>

	    				<?php endforeach ?>
	    			</div>
	    			<p>Choose from your Tags</p>
	    			<div class="the-tagcloud">
	    				<?php 
	    					foreach ($skills_names_array as $key => $value):?>
	    						
	    						<div class="tag-link-2"><?php echo $value; ?>	</div>
	    					
	    				<?php endforeach; ?>
                        <!-- <div id="other">Save Service</div> -->
	    			</div>

	    		</div>
    		</div>
    	</div>

 

    </div> <!--./row-->

    <div class="row">

    	<div>

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
			    	$i=1;
			    	$k=0;
			    	$j=0;

			    	$open_time = array('9:00', '10:00', '11:00', '12:00', 
			    		'13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00');


			    	// echo "<pre>";
			    	// print_r($open_time);
			    	// echo "</pre>";

			    	// exit();
			    	

			    		
			    	 ?>
			    	 	
			    	 	<?php $time_open=array('1', '8', '15', '22', '29', '36', '43', '50', '57', '64', '71', '78') ?>
			    	 	<tr>
						<?php foreach ($model->times as $key => $time): ?>
							<?php $key=$key+1; ?>
							

							<?php if (in_array($key, $time_open)):?>
								   <td><?=  $open_time[$j] ?></td>
									<?php $j++; ?>
								<?php endif; ?>

							<td>
								<!-- 
									use if block
									if value - skill name equals the ID the get the days array column
								 -->
									<?php 

										// echo "stebe";
										// echo "<pre>";
										// print_r($skills_timetable_array);
										// echo "</pre>";


										// echo "<pre>";
										// print_r($working_days_array);
										// echo "</pre>";
										
										// exit();
										

										// exit();
										
									 ?>
								 <?php 
								 	// use array_key_exists for associative arrays instead of in_array which works with normal arrays
								 	if (array_key_exists($skill, $skills_timetable_array)): 
								 ?>
										<?php if (in_array($time, $skills_timetable_array[$skill])):?>
											<i class="fa fa-circle" aria-hidden="true"></i>
											<span class="skk">
											<span class="skill_timetable_remove <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>">X</span>
											<span class="skill_timetable_add <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>">0</span>
											</span>
										<?php else: ?>
											<i class="fa fa-times" aria-hidden="true"></i>
											<span class="skk">
											<span class="skill_timetable_remove <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>">X</span>
											<span class="skill_timetable_add <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>">0</span>
											</span>
										<?php endif; ?>

									<?php else: ?>
										<i class="fa fa-times" aria-hidden="true"></i>
										<span class="skk">
										<span class="skill_timetable_remove <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>">X</span>
										<span class="skill_timetable_add <?php echo $skill.'-'.$time.'-'.Yii::$app->user->identity->id ?>">0</span>
										</span>
									<?php endif ?>


							</td>

							<?php if ($key%7 == 0): ?>

								</tr><tr>


								
							<?php endif ?>
							
							<?php $i++; ?>
							<?php $k++; ?>
							
						<?php endforeach ?>

			</tbody>



    	 </table>


					</div>
				<?php endforeach ?>
				<!-- <div role="tabpanel" class="tab-pane active" id="<?= $skill ?>"><?= $skill ?></div>
				<div role="tabpanel" class="tab-pane" id="<?= $skill ?>"><?= $skill ?></div>
				<div role="tabpanel" class="tab-pane" id="<?= $skill ?>"><?= $skill ?></div>
				<div role="tabpanel" class="tab-pane" id="<?= $skill ?>"><?= $skill ?></div> -->
			</div>

		</div>

		<hr>
		<hr>
		<h1>IGNORE BELOW</h1>

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
    	$i=1;
    	$j=0;

    	$open_time = array('9:00', '10:00', '11:00', '12:00', 
    		'13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00');


    	echo "<pre>";
    	print_r($open_time);
    	echo "</pre>";

    	// exit();
    	

    		
    	 ?>
    	 
    	 	<?php $time_open=array('1', '8', '15', '22', '29', '36', '43', '50', '57', '64', '71', '78') ?>
    	 	<tr>
			<?php foreach ($model->times as $key => $value): ?>
				<?php $key=$key+1; ?>
				

				<?php if (in_array($key, $time_open)):?>
					   <td><?=  $open_time[$j] ?></td>
					   <?php $j++; ?>
					
					<?php endif; ?>

				<td>

					<?php if (in_array($value, $working_days_array)):?>
					   <?=$key; ?>
					   <i class="fa fa-circle" aria-hidden="true"></i>
					<?php else: ?>
						<?=$key; ?>
						<i class="fa fa-times" aria-hidden="true"></i>
					<?php endif; ?>


				</td>

				<?php if ($key%7 == 0): ?>

					</tr><tr>


					
				<?php endif ?>
				
				<?php $i++; ?>
			<?php endforeach ?>

</tbody>



    	 </table>
    </div> <!--./row-->

</div>

