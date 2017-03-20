<?php use yii\helpers\Html; ?>
<?php use app\models\Osaka; ?>

<div class="col-md-3">
	<div class="card-image office-info-image">
		<?= Html::img($model->imgname, ['alt'=>'some', 'class'=>'responsive-img','width'=>'200']);?>
    </div>
</div>


<div class="col-md-6">
	<div class="col-md-12">
		table name
	</div>
	<div class="row">
		<div class="col-md-6">
		    <table class="">
				<tbody>
					<tr>
						<td>事業所番号(必須)</td>
						<td><?= $model->Onum ?></td>
					</tr>
					<tr>
						<td>事業所名(必須)</td>
						<td><?= $model->Oname ?></td>
					</tr>
					<tr>
						<td>電話番号(必須)</td>
						<td><?= $model->tel ?></td>
					</tr>
					<tr>
						<td>FAX</td>
						<td><?= $model->fax ?></td>
					</tr>
		            <tr>
						<td>メール</td>
						<td><?= $model->email ?></td>
					</tr>
					<!-- <tr>
						<td>住所</td>
						<td><?= $model->location ?></td>
					</tr>
					<tr>
						<td>対応可能な範囲</td>
						<td><?= $model->area ?></td>
					</tr>
					<tr>
						<td>担当者名</td>
						<td><?= $model->leader ?></td>
					</tr>
					<tr>
						<td>アピールポイント（150字程度）</td>
						<td><?= $model->apeal ?></td>
					</tr>
		            <tr>
						<td>事業所ホームページURL</td>
						<td><?= $model->url ?></td>
					</tr> -->
				</tbody>
			</table>
		</div>

		<div class="col-md-6">
		    <table class="">
				<tbody>
					<!-- <tr>
						<td>事業所番号(必須)</td>
						<td><?= $model->Onum ?></td>
					</tr>
					<tr>
						<td>事業所名(必須)</td>
						<td><?= $model->Oname ?></td>
					</tr>
					<tr>
						<td>電話番号(必須)</td>
						<td><?= $model->tel ?></td>
					</tr>
					<tr>
						<td>FAX</td>
						<td><?= $model->fax ?></td>
					</tr>
		            <tr>
						<td>メール</td>
						<td><?= $model->email ?></td>
					</tr> -->
					<tr>
						<td>住所</td>
						<td><?= $model->location ?></td>
					</tr>
					<tr>
						<td>対応可能な範囲</td>
						<td><?= $model->area ?></td>
					</tr>
					<tr>
						<td>担当者名</td>
						<td><?= $model->leader ?></td>
					</tr>
					<tr>
						<td>アピールポイント（150字程度）</td>
						<td><?= $model->apeal ?></td>
					</tr>
		            <tr>
						<td>事業所ホームページURL</td>
						<td><?= $model->url ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
