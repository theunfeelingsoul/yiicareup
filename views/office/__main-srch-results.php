<?php 
use yii\helpers\Html;
use yii\helpers\Url;
 ?>
<?php if (!empty($search_results)): ?>
	

<?php foreach ($search_results as $search_results_key => $search_result): ?>


	<div class="row">
		<div class="search-card">
			<div class="col-md-2">
				<!-- <img src="img/uploads/staff/c.jpg" alt="" class="img-thumbnail" width="200px"> -->
				<?= Html::img($search_result['img'], ['alt'=>'some', 'class'=>'img-thumbnail','width'=>'400px']);?>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="search-card-business-name">
						<div class="col-md-3 search-card-business-name-title">
							<?= Html::a($search_result['oname'], ['office/viewmore','id'=>$search_result['id']], ['class' => '','data-method' => 'post']);?>
						</div>
						<div class="col-md-9 search-card-business-name-tags">
							<!-- <span>Tags: </span> -->
							<?php if (is_array($search_result['skills'])): ?>
								<?php foreach ($search_result['skills'] as $key => $value): ?>
									<span class="label label-primary"><?= $value?></span>
								<?php endforeach ?>
							<?php else: ?>
								<span class="label label-primary"><?=$search_result['skills'] ?></span>
							<?php endif; ?>
							
						</div>
						<div class="col-md-9 search-card-business-name-tags">
							<!-- <span>Tags: </span> -->
							<?php if (is_array($search_result['skills'])): ?>
								<?php foreach ($search_result['skills'] as $key => $value): ?>
									<span class="label label-primary"><?= $value?></span>
								<?php endforeach ?>
							<?php else: ?>
								<span class="label label-primary"><?=$search_result['skills'] ?></span>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 search-card-business-appeal">
						<div class="search-card-business-appeal-title">Appeal</div>
						<div class="search-card-business-appeal-body">
							<?= $search_result['appeal'] ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="search-card-business-area">
					<div class="search-card-business-area-">
						Area
					</div>
					<div class="search-card-business-area-list">
					<?php foreach ($search_result['area'] as $key => $d): ?>
						<?php foreach ($d as $key => $dd): ?>
							<span class="label label-default"><?= $dd ?></span>
						<?php endforeach ?>
					<?php endforeach ?>
				
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endforeach ?>

<?php else: ?>
	Search came up empty
<?php endif ?>