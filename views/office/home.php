<?php 

use yii\helpers\Html; 
// use yii\helpers\Request; 
use yii\widgets\Breadcrumbs; 
use yii\helpers\ArrayHelper; 
use app\models\Osaka; 
use yii\helpers\Url;

$request = Yii::$app->request;
?>

<?php
 Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
$this->title = '事業所情報を編集: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '事業所', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->Oname;

?>

<!--   Main    -->
<div class="container">
    <div class="row">
        <h1>ケア・アップ　事業所様専用ページ</h1>
        <h4>ようこそ <?=Yii::$app->user->identity->name; ?> さん</h4>
    </div>
</div>

<!-- LIST OF OFFICES -->
<div class="row office-list-nav">
    <ul class="nav nav-pills hidden-xs">
   
        <?php foreach ($user_offices as $key => $value): ?>
            <?php if ($request->get('id') == $value->id): ?>
                <li role="presentation" class="active col-xs-5f">
            <?php elseif(!$request->get('id')): ?>
                <?php if ($key==0): ?>
                    <li role="presentation" class="active col-xs-5f">
                <?php else: ?>
                    <li role="presentation" class="col-xs-f5">
                <?php endif ?>
            <?php else: ?>
                <li role="presentation" class="col-xs-f5">
            <?php endif ?>
                <?php echo Html::a($value->Oname, ['office/viewmore','id'=>$value->id], ['class' => '']) ?>
            </li>
        <?php endforeach ?>
        <li>
            <?php echo Html::a('<span class="glyphicon glyphicon-plus"></span>', ['office/create','id'=>$value->id], ['class' => '']) ?>
            
        </li>
    </ul>
    <div class="office-list-nav-mobile visible-xs">
        
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle col-xs-12" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Choose an Office
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
             
                <?php foreach ($user_offices as $key => $value): ?>
                    <?php if ($request->get('id') == $value->id): ?>
                        <li class="active ">
                    <?php else: ?>
                        <li class="">
                    <?php endif ?>
                        <?php echo Html::a($value->Oname, ['office/viewmore','id'=>$value->id], ['class' => '']) ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>


        <!-- <div class="panel panel-default">
            <div class="panel-heading">List of Offices</div>
            

            <ul class="list-group">
     
                </?php foreach ($user_offices as $key => $value): ?>
                    </?php if ($request->get('id') == $value->id): ?>
                        <a href='</?= Url::to(["office/viewmore", "id" => $value->id]); ?>' class="list-group-item active">
                    </?php else: ?>
                        <a href="</?= Url::to(['office/viewmore', 'id' => $value->id]); ?>" class="list-group-item">
                    </?php endif ?>
                        <?= $value->Oname ?>
                    </a>
                </?php endforeach ?>
                <a href='</?= Url::to(["office/create", "id" => $value->id]); ?>' class="list-group-item">
                    <span class="glyphicon glyphicon-plus"></span>
                    
                </a>
            </ul>
        </div>  -->
        <!--./panel panel-default-->

    </div>
</div>

<!-- OFFICE INFORMATION -->
<div class="row">
    <div class="care-panel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- <div class="panel-title">Panel title</div> -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <!-- <span class="glyphicon glyphicon-play pull-left">STAFF</span> -->
                        <p class="panel-title white-text">事業所情報</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <?php echo Html::a('<span class="glyphicon glyphicon-pencil"> </span> 編集する', ['office/update','id'=>$model->id], ['class' => 'btn btn-warning pull-right white-text btn-xs']) ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            	<!-- OFFICE INFORMATION -->
            	<?=	$this->render('__office-details-table', [
            		'model'=> $model,
            	]) ?>

                
                <div class="col-md-3">
            		<!-- SERIVCE TAGS-->
            		<?= $this->render('__service-tags', [
            			'service_display'   => $service_display,
            			'model_service_name'=> $model_service_name,
            			'user_office_id'    => $model->id,
            		]); ?>

                	<!-- APPEAL TAGS-->
            		<?=$this->render('__appeal-tags', [
            			'tags_display'      => $tags_display,
            			'skills_names_array'=> $skills_names_array,
            			'user_office_id'    => $model->id,
            		]); ?>
                </div>
            </div>
        </div> <!--./panel panel-default-->
    </div> <!--./care-panel-->
</div> <!--./row-->


<div class="row">
    <div class="care-panel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- <div class="panel-title">Panel title</div> -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <!-- <span class="glyphicon glyphicon-play pull-left">STAFF</span> -->
                        <p class="panel-title white-text">空き時間</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <?php echo Html::a('<span class="glyphicon glyphicon-pencil"> </span> 編集する', ['office/update','id'=>$model->id], ['class' => 'btn btn-warning pull-right white-text btn-xs']) ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#office-timetable" aria-controls="office-timetable" role="tab" data-toggle="tab">
                            事業所
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#skill-timetable" aria-controls="skill-timetable" role="tab" data-toggle="tab">
                            各資格の空き
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="office-timetable">
                        <?= $this->render('__office-timetable', [
                            'model'=> $model,
                            'office_timetable'          => $office_timetable,
                            'user_office_id'            => $model->id,
                            ]);
                         ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="skill-timetable">
                        <?= $this->render('__skill-timetable', [
                            'model'=> $model,
                            'skills_names_array'        => $skills_names_array,
                            'new_skilltimetable_array'  => $new_skilltimetable_array,
                            'user_office_id'            => $model->id,
                        ]) ?>
                    </div>
                </div><!--./tab-content-->
            </div> <!--./panel-body-->
        </div> <!--./panel-->
    </div> <!--./care-panel-->
</div> <!--./row-->

<!-- staff -->
<div class="row">
    <div class="care-panel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- <div class="panel-title">Panel title</div> -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <!-- <span class="glyphicon glyphicon-play pull-left">STAFF</span> -->
                        <p class="panel-title white-text">STAFF</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <?php echo Html::a('<span class="glyphicon glyphicon-pencil"> </span> 編集する', ['staff/index','id'=>$model->id], ['class' => 'btn btn-warning pull-right white-text btn-xs']) ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">

                <?php if ($staff_data): ?>
               
                <div class="alert alert-success staff-delete-success" role="alert">成功する.</div>
                <?php foreach ($staff_data as $staff_key => $staff): ?>
                    <div class="col-sm-6 col-md-3" id="<?='staffer_'.$staff['id'] ?>">
                        <div class="care-card">
                            <div class="care-card-image">
                            <?= Html::img($staff['image_path'], ['alt'=>'"alt"', 'class'=>'img-responsive img-circle','width'=>'']); ?>
                            </div>
                            
                            <div class="care-card-title">
                                <h3><?= $staff['staff_name'] ?></h3>
                            </div>
                            <div class="care-card-body">
                                <div class="care-card-body-item">Years of epxereince:<?= $staff['staff_years_of_exp'] ?></div>
                                <div class="care-card-body-item"> Skill: <?= $staff['staff_skill'] ?></div>
                                <div class="care-card-body-item">Appeal:<?= $staff['appeal'] ?></div>
                                <hr>
                                <div class="care-card-body-item care-card-actions">
                                    <?php echo Html::a('Update', ['staff/update','id'=>$staff['id']], ['class' => 'white-text col-md-6']) ?>
                                    <a href="" onclick="return false" class="home_delete_staff white-text col-md-6 <?=$staff['id']?>">Delete</a>
                                   <!--  </?php echo Html::a('Delete', ['staff/delete','id'=>$staff['id']], ['class' => 'white-text col-md-6','data-method' => 'post']) ?> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                 <?php endif ?>
                  <div class="col-sm-6 col-md-3">
                    <div class="care-staff-add">
                        <!-- <span class="glyphicon glyphicon-plus img-circle" ></span> -->
                         <?php echo Html::a('<span class="glyphicon glyphicon-plus img-circle"> </span>', ['staff/create','get_office_id'=>$model->id], ['class' => '']) ?>
                    </div>
                    <img src="">
                </div>
            </div>
        </div>
    </div> <!--./care-panel-->
</div> <!--./row-->
    		





