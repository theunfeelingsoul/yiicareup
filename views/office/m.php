<?php 
use yii\widgets\ActiveForm; 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use app\models\Office;
use app\models\Services;
use app\models\Osaka;
use app\models\Tags;

$serviceList = ArrayHelper::map(Services::find()->all(), 'Sid', 'Sname');
$skillList = ArrayHelper::map(tags::find()->all(), 'Skid', 'Skname');
$areaList = ArrayHelper::map(Osaka::find()->all(), 'Cid', 'Cname');

?>

<!-- call search for desktop -->
<?php 
	echo  $this->render('__m-advanced-srch', [
		'model'                 => $model,
		'model_office_timetable'=> $model_office_timetable,
		'group_tags'      		=> $group_tags,
	]);
?>


<!-- ####################################################################################### -->

<!-- Call model search -->

<?php 
	echo  $this->render('__m-mobile-srch', [
		'model'                 => $model,
		'model_office_timetable'=> $model_office_timetable,
		'group_tags'      		=> $group_tags,
	]);
?>

	<?php ActiveForm::end() ?>


<!-- Show search results if a search has been submited -->
<?php if (!empty($search_results)): ?>
	<?= $this->render('__main-srch-results', [
		'model'                 => $model,
		'model_office_timetable'=> $model_office_timetable,
		'search_results'      	=> $search_results,
		'group_tags'      		=> $group_tags,
	]) ?>

<?php endif ?>





