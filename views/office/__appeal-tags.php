<div class="row">
	<span class="tagcloud-title">アピールタグ</span>
	<div class="tagdiv">
		<div class="the-tagcloud">
                <ul class="collection">
                    <?php
                        foreach ($skills_names_array as $key => $value):?>
                            <li class="collection-item">
                                <div class="area-tag-item <?=$user_office_id." ".$value['skill_id'] ?>">
                                    <?php echo $value['skill_name']; ?>
                                </div>
                            </li>
                    <?php endforeach; ?>
                </ul>
                <!-- <div id="other">Save Service</div> -->
		</div>

	</div>
</div>

