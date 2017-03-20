<div class="card">
	<div class="card-content">
		<span class="card-title">主な営業エリア</span>
    		<div class="tagdiv">

    			<div class="the-tagcloud">
                    <ul class="collection">
                        <?php
                            foreach ($area_names_array as $key => $value):?>
                                <li class="collection-item">
                                    <div class="area-tag-item <?=$user_office_id." ".$value['Cid'] ?>">
                                        <?php echo $value['Cname']; ?>
                                    </div>
                                </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- <div id="other">Save Service</div> -->
    			</div>

    		</div>
		<div class="divider"></div> <!--./divider-->
	</div><!--./card-content-->
</div><!--./card-->
