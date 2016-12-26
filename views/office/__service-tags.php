<div class="card">
	<div class="card-content">
		<span class="card-title">Services</span>
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
	    						<div class="service-tag-item <?=$user_office_id ?>">
	    							<?php echo $value['Sname']; ?>	
	    						</div>
    						</li>
    					
    				<?php endforeach; ?>
    				</ul>
                    <!-- <div id="other">Save Service</div> -->
    			</div>

    		</div>
		<div class="divider"></div> <!--./divider-->
	</div>
</div>