<div class="row">
    <span class="tagcloud-title">提供可能なサービス</span>
	<div class="tagdiv">
		<div class="the-tagcloud">
            <ul class="collection">
            	<?php if ($model_service_name): ?>
				<?php
					foreach ($model_service_name as $key => $value):?>
						<li class="collection-item">
    						<div class="service-tag-item <?=$user_office_id." ".$value['Sid'] ?>">
    							<?php echo $value['Sname']; ?>
    						</div>
						</li>

				<?php endforeach; ?>
				<?php else: ?>
					<liclass="collection-item">
					No Service</li>
				<?php endif ?>
			</ul>
            <!-- <div id="other">Save Service</div> -->
		</div>

	</div>
</div>