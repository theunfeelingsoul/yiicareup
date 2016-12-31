<?php use yii\helpers\Html; use yii\widgets\Breadcrumbs;?>

<?php 
 Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
$this->title = 'Update Office: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->Oname; 

?>
<div class="row">
    <!-- Side Nav -->
    <div class="col s12 m4 l3">

        <?= $this->render('__normal-nav', [
        	'model'=> $model 
        ]); ?>
    </div>

    <div class="col s12 m8 l8">
        <!-- PRE-LOADER -->
        <div class="col s12" id="preloader">
            <div class="preloader-wrapper big active center-align">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div><!--./preloader-wrapper-->
        </div> <!--./col s12-->
    
	    <!-- OFFICE INFO HEADER -->
			<div class="row">
				<div class="col s12">
							<div id="office-info-header">
								<div class="row">
									<div class="col s12 m12 l4">
										<div class="office-name">
											<h2>
											<?php echo $model->Oname ?>
											</h2>
										</div>
									</div>

									<div class="col s12 m12 l8 push-l5">
										<?= Html::a( "Edit", $url = ['office/update','id'=>$user_office_id], $options = ['class'=>'waves-effect waves-light btn col s12 l2'] ) ?>

							    	</div>

						    	</div>
					    	</div>
						<div class="card-action">
							<a href="#">This is a link</a>
							<a href="#">This is a link</a>
						</div>
				</div>
			</div> <!--./row-->

			


	    <div class="divider"></div>


		<!-- OFFICE INFORMATION -->
		<div class="row">

			<!-- OFFICE INFORMATION -->
			<?=	$this->render('__office-details-table', [
				'model'=> $model,
			]) ?>
			
			
		</div>

		<!-- SERVICE AND APPEAL TAGS -->
		<div class="row">

			<h2>TAGS</h2>
				<!-- SERIVCE TAGS-->
		    	<div class="col s12 l6 m6">
					<?= $this->render('__service-tags', [
						'Service_display'   => $Service_display,
						'model_service_name'=> $model_service_name,
						'user_office_id'    => $model->id,
					]); ?>
		    	</div>

		    	<!-- APPEAL TAGS-->
		    	<div class="col s12 l6 m6">
					<?=$this->render('__appeal-tags', [
						'tags_display'      => $tags_display,
						'skills_names_array'=> $skills_names_array,
						'user_office_id'    => $model->id,
					]); ?>
		    	</div>

		</div>

	<div class="row">
		<H2>Open hours</H2>
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s3"><a class="active" href="#office-timetable">OFFICE TIMETABLE</a></li>
				<li class="tab col s3"><a href="#skill-timetable">SKILL TIMETABLE</a></li>
			</ul>
		</div>
		<div id="office-timetable" class="col s12">
			<!-- <div class="col s12"> -->
				<?=	$this->render('__office-timetable', [
					'model'=> $model,
					'office_timetable'          => $office_timetable,
					'user_office_id'            => $model->id,
					]);
				 ?>
			<!-- </div> -->
		</div>
		<div id="skill-timetable" class="col s12">
			<!-- <div class="col s12"> -->
				<?=	$this->render('__skill-timetable', [
					'model'=> $model,
					'skills_names_array'        => $skills_names_array,
					'new_skilltimetable_array'  => $new_skilltimetable_array,
					'user_office_id'            => $model->id,
				]) ?>
			<!-- </div> -->
		</div>
	</div>


	


