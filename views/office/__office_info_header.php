<div class="divider"></div>
		<div id="office-info-header">
			<div class="col s12">
			<!-- <div class="left office-name"> -->
				<h3><?php echo $model->Oname ?></h3>
			</div>

			<div class="col s2">
			<!-- <div class="office-info-header-item left"> -->

				<?= Html::a( "Edit", $url = ['office/update','id'=>$user_office_id], $options = ['class'=>'waves-effect waves-light btn'] ) ?>

	    	</div>

	    	<!-- <div class="col s4 l2"> -->
	    	<!-- <div class="office-info-header-item right"> -->
				<!-- < Html::a( "View all", $url = ['office/index'], $options = ['class'=>'waves-effect waves-light btn'] ) ?>

	    	</div> -->
    	</div>