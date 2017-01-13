<div class="card">
	<div class="card-content">
		<span class="card-title">Services</span>
    		<div class="tagdiv">
    			<div class="tagchecklist-service row">
    				<?php foreach ($service_display as $key => $value): ?>


						<div class="tagchecklist-service-item <?= $value['id'] ?>">
							<div class="chip">
								<i class="close material-icons">close</i>
								<?= $value['service_name'] ?>
							</div>
						</div>

    				<?php endforeach ?>
    			</div>
                <?php if ($model_service_name): ?>
                    <p>Choose from your Services</p>
                    <div class="the-tagcloud">
                        <ul class="collection">
                				<?php foreach ($model_service_name as $key => $value):?> 
                                    <li class="collection-item">
        	    						<div class="service-tag-item <?=$user_office_id." ".$value['Sid'] ?>">
        	    							<?php echo $value['Sname']; ?>	
        	    						</div>
            						</li>
                				<?php endforeach; ?>
                        </ul>
                        <!-- <div id="other">Save Service</div> -->
                    </div>
                <?php endif ?>

    		</div>
		<div class="divider"></div> <!--./divider-->
	</div><!--./card-content-->
</div><!--./card-->