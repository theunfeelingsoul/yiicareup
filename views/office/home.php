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

        <?= 
        	$this->render('__normal-nav', [
        	// $this->render('__slide-out-nav', [
        	'model'=> $model 
        ]); ?>
    </div>	

    <div class="col s12 m8 l8">
        <!-- PRE-LOADER -->
        <!-- Modal Trigger -->

  <!-- Modal Structure -->
 
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
			<div class="col s12 pull">
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

							<div class="fixed-action-btn horizontal click-to-toggle">
								<a class="btn-floating btn-large red">
									<i class="material-icons">menu</i>
								</a>
								<ul>
									<li>
										<?= Html::a( '<i class="material-icons">mode_edit</i>', $url = ['office/update','id'=>$user_office_id], $options = ['class'=>'waves-effect waves-light btn-floating red'] ) ?>
									</li>
									<li>
										<?= Html::a( '<i class="material-icons">visibility</i>', $url = ['office/view','id'=>$user_office_id], $options = ['class'=>'waves-effect waves-light btn-floating green'] ) ?>
									</li>
									<li>
										<?= Html::a( '<i class="fa fa-plus" aria-hidden="true"></i>', $url = ['office/create','id'=>$user_office_id], $options = ['class'=>'waves-effect waves-light btn-floating green'] ) ?>
									</li>
									<!-- <li><a class="btn-floating yellow darken-1"><i class="material-icons">delete</i></a></li>
									<li><a class="btn-floating green"><i class="material-icons">visibility</i></a></li> -->
									<!-- <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li> -->
								</ul>
							</div>
							<!-- </?= Html::a( "Edit", $url = ['office/update','id'=>$user_office_id], $options = ['class'=>'waves-effect waves-light btn col s12 l2'] ) ?> -->
														 <!-- Dropdown Trigger -->
							  <!-- <a class='dropdown-button btn' href='#' data-activates='editd'>Drop Me!</a> -->
							  

				    	</div>

			    	</div>
		    	</div>
					<!-- <div class="card-action">
						<a href="#">View Less</a>
						<a href="#">Edit</a>
					</div> -->
			</div>
		</div> <!--./row-->

	    <div class="divider"></div>

		<!-- OFFICE INFORMATION -->
		<div class="row">
			<div class="col l6 s12">
				<div class="">
					<!-- OFFICE INFORMATION -->
					<?=	$this->render('__office-details-table', [
						'model'=> $model,
					]) ?>
				</div>
			</div>
			<div class="col l6 s12">
				<h3>Tags</h3>
				<!-- SERIVCE TAGS-->
		    	<div class="row">
					<?= $this->render('__service-tags', [
						'service_display'   => $service_display,
						'model_service_name'=> $model_service_name,
						'user_office_id'    => $model->id,
					]); ?>
		    	</div>

		    	<!-- APPEAL TAGS-->
		    	<div class="row">
					<?=$this->render('__appeal-tags', [
						'tags_display'      => $tags_display,
						'skills_names_array'=> $skills_names_array,
						'user_office_id'    => $model->id,
					]); ?>
		    	</div>
			</div>
		</div>

		<div class="row">
			<H2>Open hours</H2>
			<div class="col s12">
				<ul class="tabs teal-text">
					<li class="tab col s3 teal-text"><a class="active" href="#office-timetable">OFFICE TIMETABLE</a></li>
					<li class="tab col s3 teal-text"><a href="#skill-timetable">SKILL TIMETABLE</a></li>
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
	</div>
</div><!--./row-->


	


