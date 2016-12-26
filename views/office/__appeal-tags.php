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
	    						<div class="skill-tag-item <?=$user_office_id ?>">
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