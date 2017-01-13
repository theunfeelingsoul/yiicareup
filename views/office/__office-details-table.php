<?php use yii\helpers\Html; ?>
<h3>Office Information</h3>
<div class="card">
	<div class="card-image office-info-image">
      <?= Html::img($model->imgname, ['alt'=>'some', 'class'=>'responsive-img','width'=>'']);?> 
      <span class="card-title">Card Title</span>
    </div>
	<div class="card-content">
		<!--<span class="card-title">Office Information</span>-->
		<!-- <h2>Office Information</h2>	 -->
		<div class="row">
			<table class="bordered highlight office-home-info-table-left responsive-table">
				<thead>
					<th>Position</th>
					<th>Name</th>
					<th>Value</th>
				</thead>
				<tbody>
					<tr>
						<!-- <td>電話番号(必須) Phone Number Required)</td> -->
						<td>1</td>
						<td>電話番号(必須)</td>
						<td><?= $model->tel ?></td>
					</tr>
					<tr>
						<!-- <td>事業所名(必須)	Plant name (required)</td> -->
						<td>2</td>
						<td>事業所名(必須)</td>
						<td><?= $model->Oname ?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>担当者名</td>
						<!-- <td>担当者名 Name of the person in charge</td> -->
						<td><?= $model->leader ?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>アピールポイント（200字程度）</td>
						<!-- <td>アピールポイント（200字程度） Appeal point (about 200 words)</td> -->
						<td><?= $model->apeal ?></td>
					</tr>

					<tr>
						<td>5</td>
						<td>電話番号(必須)</td>
						<!-- <td>電話番号(必須) Phone Number Required)</td> -->
						<td><?= $model->tel ?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>事業所名(必須)</td>
						<!-- <td>事業所名(必須)	Plant name (required)</td> -->
						<td><?= $model->Oname ?></td>
					</tr>
					<tr>
						<td>7</td>
						<td>担当者名</td>
						<!-- <td>担当者名 Name of the person in charge</td> -->
						<td><?= $model->leader ?></td>
					</tr>
					<tr>
						<td>8</td>
						<td>アピールポイント（200字程度）</td>
						<!-- <td>アピールポイント（200字程度） Appeal point (about 200 words)</td> -->
						<td><?= $model->apeal ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>