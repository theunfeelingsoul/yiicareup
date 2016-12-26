<?php
namespace app\controllers;

use Yii;
use app\models\Office;
use app\models\OfficeSearch;
use app\models\Servicedisplay;
use app\models\Services;
use app\models\Tagsdisplay;
use app\models\Tags;
use app\models\Skillstimetable;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OfficeController implements the CRUD actions for Office model.
 */
class OfficeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['home','create','update','delete'],
                'rules' => [
                    // [
                    //     'allow' => true,
                    //     'actions' => ['login', 'signup'],
                    //     'roles' => ['?'],
                    // ],
                    [
                        'allow' => true,
                        'actions' => ['home','create','update','delete'],
                        'roles' => ['@'], // only authenticated users
                    ],
                ],
            ],
        ];
    }



    /**
     * Lists all Office models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "careup";
        $searchModel = new OfficeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Office model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = "careup";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Office model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "careup";

        $model = new Office();

        if ($model->load(Yii::$app->request->post())) {

            // Data from the dropdown list come in array format
            // chnage it to a string delimited by commas
            // save it to the respective model attribute
            $model->area = implode(', ', $model->area);
            $model->service = implode(', ', $model->service);
            $model->skills = implode(', ', $model->skills);

            // array containing all working dates
            $times=array('mon_9','tue_9','wed_9','thu_9','fri_9','sat_9','sun_9','mon_10','tue_10','wed_10','thu_10','fri_10','sat_10','sun_10','mon_11','tue_11','wed_11','thu_11','fri_11','sat_11','sun_11','mon_12','tue_12','wed_12','thu_12','fri_12','sat_12','sun_12','mon_13','tue_13','wed_13','thu_13','fri_13','sat_13','sun_13','mon_14','tue_14','wed_14','thu_14','fri_14','sat_14','sun_14','mon_15','tue_15','wed_15','thu_15','fri_15','sat_15','sun_15','mon_16','tue_16','wed_16','thu_16','fri_16','sat_16','sun_16','mon_17','tue_17','wed_17','thu_17','fri_17','sat_17','sun_17','mon_18','tue_18','wed_18','thu_18','fri_18','sat_18','sun_18','mon_19','tue_19','wed_19','thu_19','fri_19','sat_19','sun_19','mon_20','tue_20','wed_20','thu_20','fri_20','sat_20','sun_20');
            // $times=array('mon_9', 'tue_9', 'wed_9', 'thu_9', 'fri_9', 'sat_9', 'sun_9', 'mon_10', 'tue_10', 'wed_10', 'thu_10', 'fri_10', 'sat_10', 'sun_10', 'mon_11', 'tue_11', 'wed_11', 'thu_11', 'fri_11', 'sat_11', 'sun_11', 'mon_12', 'tue_12', 'wed_12', 'thu_12', 'fri_12', 'sat_12', 'sun_12', 'mon_13', 'tue_13', 'wed_13', 'thu_13', 'fri_13', 'sat_13', 'sun_13', 'mon_14', 'tue_14', 'wed_14', 'thu_14', 'fri_14', 'sat_14', 'sun_14', 'mon_15', 'tue_15', 'wed_15', 'thu_15', 'fri_15', 'sat_15', 'sun_15', 'mon_16', 'tue_16', 'wed_16', 'thu_16', 'fri_16', 'sat_16', 'sun_16', 'mon_17', 'tue_17', 'wed_17', 'thu_17', 'fri_17', 'sat_17', 'sun_17', 'mon_18', 'tue_18', 'wed_18', 'thu_18', 'fri_18', 'sat_18', 'sun_18', 'mon_19', 'tue_19', 'wed_19', 'thu_19', 'fri_19', 'sat_19', 'sun_19', 'mon_20', 'tue_20', 'wed_20', 'thu_20', 'fri_20', 'sat_20', 'sun_20');

            // If the any date was checked, save it a string delimited by commas
            $working_days = array();
            foreach ($times as $key => $value) {
                if ( $model->$value == '1') {
                    array_push($working_days, $value);
                }
            }

             // save the string to the model attribute
            $model->holiday = implode(',', $working_days);

            // add the user id
            $model->user_id = Yii::$app->user->identity->id;

            // upload image to folder
            $model->imageFile = UploadedFile::getInstance($model, 'imgname'); // get image
            
            // get a random number as the image name
            $img_name = mt_rand();
            $img_path = "img/uploads/".$img_name;
            // save it to the variable 
            $model->imgname = $img_path.'.'.$model->imageFile->extension;
            // upload image to folder
            if (!$model->upload($img_name)) { 
                echo "did not upload";
                exit();
            }
            
            // save model
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
                exit();
            }else{
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Office model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = "careup";

        $model = $this->findModel($id);
        $first_model_imgname = $model->imgname;


        // echo "<pre>";
        // print_r($first_model);
        // echo "</pre>";

        // exit();
        

        // fill the checkboxes
        // get the holiday values
        $working_days = $model->holiday;
        // explode them
        $working_days_array=explode(",", $working_days);

        // loop through the array and update the chekboxes
        foreach ($working_days_array as $key => $value) {
            $model->$value =1;
        }


        $model->service = explode(',', $model->service); 
        $model->area = explode(',', $model->area); 

        if ($model->load(Yii::$app->request->post())) {

            // Data from the dropdown list come in array format
            // chnage it to astring delimited by commas
            // save it to the respective model attribute
            $model->area = implode(', ', $model->area);
            $model->service = implode(', ', $model->service);


            // If the any date was checked, save it a string delimited by commas
            $working_days = array();
            foreach ($model->times as $key => $value) {
                if ( $model->$value == '1') {
                    array_push($working_days, $value);
                }
            }


           //  echo "<pre>";
           //  print_r($working_days);
           //  echo "</pre>";
            
           // exit();
             // save the string to the model attribute
            $model->holiday = implode(',', $working_days);

            // exit();
            // upload image to folder
            $image_instance= $model->imageFile = UploadedFile::getInstance($model, 'imgname'); // get image
            

         
             
            // upload image to folder
            if ($image_instance) {
              
                // get a random number as the image name
                $img_name = mt_rand();
                $img_path = "img/uploads/".$img_name;
                // save it to the variable 
               $model->imgname = $img_path.'.'.$model->imageFile->extension;

                if ($model->upload($img_name) == false) { 
                    echo "did not upload";
                    exit();
                }
            //      echo  $model->imgname;
            //       echo "in";
            //        echo "<pre>";
            // print_r($image_instance);
            // echo "</pre>";
            
            // exit();
            }else{
                $model->imgname=$first_model_imgname;
            }
            
            // echo "out";
            // echo  $model->imgname;
            // exit();

                $model->Onum = 22889;
                $model->blanktime_s = 22889;
                $model->blanktime_f = 22889;
                $model->staff = 22889;

             // save model
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
                exit();
            }else{
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Saves the tags into tags_display table
     * @param string $_POST['name']
    */
    public function actionAjaxtags()
    {

        if (Yii::$app->request->isAjax) {
            // POST request
            $tag_post_name = $_POST['name'];

            $modelTagsDisplay = new Tagsdisplay();

            // check if the given tag_name exists in tags_display table
            $exists = $modelTagsDisplay->tagNameExists($tag_post_name); 

            // if it dosen't exts sane
            if (!$exists) {
                // insert a new row of data
                $modelTagsDisplay->tag_name = $tag_post_name;
                $modelTagsDisplay->office_id = 3;
                $modelTagsDisplay->user_id = Yii::$app->user->identity->id;
                $modelTagsDisplay->save(false);
            }

            exit();
         }
    }

    /**
     * Saves the service name into service display table
     * 
     * @param string $_POST['name']
    */
    public function actionAjaxservicetags()
    {

        $model = new Office();

        if (Yii::$app->request->isAjax) {

            //  POST request
            $service_post_name = $_POST['name'];

            // check if it exists in service_display table already
            $exists= $model->ServiceDisplayExists($service_post_name);   

            // if it dosen't exist save
            if (!$exists) {
                // insert a new row of data
                $Servicedisplay = new Servicedisplay();
                $Servicedisplay->service_name = $service_post_name;
                $Servicedisplay->user_id = Yii::$app->user->identity->id;
                $Servicedisplay->save(false);
            }

            exit();
         }
    }


    public function actionAjaxskilltimetableremove()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $skill_class      = $_POST['skill'];
            $day_class        = $_POST['day'];
            $user_id_class    = $_POST['user_id'];

            $modelSkillstimetable = new Skillstimetable();
            $modelTags = new Tags();

            // check if it exists in service_display table already
            // TODO
            // chnage the skill name to id
            $skill_id=$modelTags->findTagSkidBySkname($skill_class);
            // use it to chekc if exists
            // 
            $exists= $modelSkillstimetable->Exists($skill_id,Yii::$app->user->identity->id);

            // if it doesnt exist it will create it
            // if it does it will update it

            // if it dosen't exist save
            if ($exists) {

                $modelSkillstimetable = $modelSkillstimetable->findBySkidAndUser_id($skill_id,Yii::$app->user->identity->id); 
                // insert a new row of data
                // $modelSkillstimetable = new Skillstimetable();
                // get the days string
                $modelSkilltimetable_days = $modelSkillstimetable->days;

                // change it to an array
                $modelSkilltimetable_days_array = explode(',', $modelSkilltimetable_days); 
                // check if the the new value exists
                if (in_array($day_class, $modelSkilltimetable_days_array)) {
                    // unset the variable
                    foreach ($modelSkilltimetable_days_array as $key => $value) {
                        if ($value==$day_class) {
                            unset($modelSkilltimetable_days_array[$key]);
                        }
                    }
                }


                // chnage the array to a string delimited by commas

                $modelSkilltimetable_days_imploded = implode(",", $modelSkilltimetable_days_array);


                // save the value to the attribute
                $modelSkillstimetable->days = $modelSkilltimetable_days_imploded;
                // $modelSkillstimetable->skid = $service_post_name;
                // $Servicedisplay->user_id = Yii::$app->user->identity->id;
                $modelSkillstimetable->save(false);

                echo "removed";
            }

            exit();
         }

    } // end AjaxSkilltimetable()


   


    public function actionAjaxskilltimetableadd()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $skill_class      = $_POST['skill'];
            $day_class        = $_POST['day'];
            $user_id_class    = $_POST['user_id'];

            $modelSkillstimetable = new Skillstimetable();
            $modelTags = new Tags();

            // check if it exists in service_display table already
            // TODO
            // chnage the skill name to id
            $skill_id=$modelTags->findTagSkidBySkname($skill_class);
            // use it to chekc if exists
            // 
            $exists= $modelSkillstimetable->Exists($skill_id,Yii::$app->user->identity->id); 

            // if it doesnt exist it will create it
            // if it does it will update it

            // if it dosen't exist save
            if ($exists) {
                $modelSkillstimetable = $modelSkillstimetable->findBySkidAndUser_id($skill_id,Yii::$app->user->identity->id); 
                // insert a new row of data
                // $modelSkillstimetable = new Skillstimetable();
                // get the days string
                $modelSkilltimetable_days = $modelSkillstimetable->days;

                // change it to an array
                $modelSkilltimetable_days_array = explode(',', $modelSkilltimetable_days); 
                // check if the the new value exists
                if (in_array($day_class, $modelSkilltimetable_days_array)) {
                    // echo "Got Irix";
                // if it does dont do anything
                }else{
                // if it isnt add it to the array
                    array_push($modelSkilltimetable_days_array, $day_class);
                }


                // chnage the array to a string delimited by commas

                $modelSkilltimetable_days_imploded = implode(",", $modelSkilltimetable_days_array);


                // save the value to the attribute
                $modelSkillstimetable->days = $modelSkilltimetable_days_imploded;
                // $modelSkillstimetable->skid = $service_post_name;
                // $Servicedisplay->user_id = Yii::$app->user->identity->id;
                $modelSkillstimetable->save(false);

                echo "added";
            }else{
                // add a new record
                $modelSkillstimetable->skid     = $skill_id; // gotten at the beginning 
                $modelSkillstimetable->days     = $day_class; 
                $modelSkillstimetable->user_id  = $user_id_class; 

                $modelSkillstimetable->save();

                echo "created"; 
            }

            exit();
         }

    } // end AjaxSkilltimetable()



    public function actionHome($id=false)
    {

        // chnage the layout
        $this->layout = "careup";

        $modelServices = new Services();
        $modelServiceDisplay = new Servicedisplay();
        $modelTagsDisplay = new Tagsdisplay();
        $modelOffice = new Office();
        $modelTags = new Tags();
        $modelSkillstimetable = new Skillstimetable();

        // find the office ids by user_id
        $user_offices = $modelOffice->findByUserId();

         // $id=3;
        if ($id) {
            $model = $this->findModel($id);
        }else{
            $model = $this->findModel($modelOffice->findLatestIdByUserId());
        }

        

        // explode the service string
        $model_service_id = explode(',', $model->service); 
        $model_service_name = array();
        // loop through the exploded array, find the records by Sid from services table
        foreach ($model_service_id as $key => $value) {
            // find the records and add them to an array
            $model_service_name[] = $modelServices->findBySid($value);
        }


        // get the service diplay
        $Service_display = $modelServiceDisplay->findByUserId();

        // get the service diplay
        $tags_display = $modelTagsDisplay->findByUserId();

                 // get the tags diplay
         $tags = Tags::find()
                // ->where(['user_id' => Yii::$app->user->identity->id])
                ->where(['Skgroup' => 2])
                ->all();

        // EXPLODE THE TIMES
        $working_days = $model->holiday;
        $working_days_array=explode(",", $working_days);

        // get skills. These are the Ids
        $skills_id_array = explode(",", $model->skills);
        $skills_names_array = array(); // array to save the skill names

        // get the skills timetable
        $skills_timetable = $modelSkillstimetable->findByUserId();



        // get the skill ids in the skilltimetable
        $skills_timetable_grouped_by_skid= $modelSkillstimetable->findByUserIdAndGropupedBySkid();


        // echo "<pre>";
        // print_r($skills_timetable_grouped_by_skid);
        // echo "</pre>";
        
        // use a loop and change the skill ids to names
        foreach ($skills_timetable_grouped_by_skid as $key => $skid_grouped) {
           // echo $skid_grouped->skid;

           // get all the days_and_time by the skid
           $new_skillstimetable_days_and_time = $modelSkillstimetable->findByUserIdAndSkid($skid_grouped->skid);

           
           //get the result set and put the days_and_time in arrays
           foreach ($new_skillstimetable_days_and_time as $key => $new_skill_day_time) {
               $new_skillstimetable_days_and_time_array[] = $new_skill_day_time->day_and_time.'-'.$new_skill_day_time->status;
           }



           // echo "<pre>";
           // print_r($new_skillstimetable_days_and_time_array);
           // echo "</pre>";
           
           // exit();
           

           // change the skill id to names
           $new_skill_name = $modelTags->findTagsById($skid_grouped->skid); 
           // associate the skill name with the day_and_time arrays
           $new_skilltimetable_array= array($new_skill_name => $new_skillstimetable_days_and_time_array);

           // $new_skilltimetable_array[$new_skill_name]= $new_skillstimetable_days_and_time_array;

        }


        echo "<pre>";
        print_r($new_skilltimetable_array);
        echo "</pre>";
        
        // exit();
        
        
        // in the loop get all the days beloging to theskill id


        // echo "<pre>";
        // print_r($skills_timetable);
        // echo "</pre>";
        
        // create an array
        // $skills_timetable_array = array();
        // chnage the user ID to name and explode the days column
        foreach ($skills_timetable as $key => $skill_time) {
            $skill_days_array = explode(",", $skill_time->day_and_time);
            $skill_name = $modelTags->findTagsById($skill_time->skid); 

            // echo "<pre>";
            // print_r($skill_days_array);
            // echo "</pre>";
            
           // $skills_timetable_array[] = 
           // $skills_timetable_array = array($modelTags->findTagsById($skill_time->skid), $skill_days_array);
           $skills_timetable_array = array($skill_name => $skill_days_array);
           // $skills_timetable_array = array($skill_name,$skill_days_array);

        }


        // echo "<pre>";
        // print_r($skills_timetable_array);
        // echo "</pre>";

        // exit();
        
        
        // get the skill names using Ids gotten above
        foreach ($skills_id_array as $key => $value) {
            $skills_names_array[] = $modelTags->findTagsById($value); // add all the skill names into the array
        }

         return $this->render('home', [
                'model' => $model,
                'working_days_array' => $working_days_array,
                'model_service_name' => $model_service_name,
                'Service_display' => $Service_display,
                'tags_display' => $tags_display,
                'tags' => $tags,
                'user_offices' => $user_offices,
                'skills_names_array' => $skills_names_array,
                'skills_timetable_array' => $skills_timetable_array,
                'new_skilltimetable_array' => $new_skilltimetable_array,
            ]);
    }

    public function actionHomeback($id=false)
    {

        // chnage the layout
        $this->layout = "careup";

        $modelServices = new Services();
        $modelServiceDisplay = new Servicedisplay();
        $modelTagsDisplay = new Tagsdisplay();
        $modelOffice = new Office();
        $modelTags = new Tags();
        $modelSkillstimetable = new Skillstimetable();

        // find the office ids by user_id
        $user_offices = $modelOffice->findByUserId();

         // $id=3;
        if ($id) {
            $model = $this->findModel($id);
        }else{
            $model = $this->findModel($modelOffice->findLatestIdByUserId());
        }

        

        // explode the service string
        $model_service_id = explode(',', $model->service); 
        $model_service_name = array();
        // loop through the exploded array, find the records by Sid from services table
        foreach ($model_service_id as $key => $value) {
            // find the records and add them to an array
            $model_service_name[] = $modelServices->findBySid($value);
        }


        // get the service diplay
        $Service_display = $modelServiceDisplay->findByUserId();

        // get the service diplay
        $tags_display = $modelTagsDisplay->findByUserId();

                 // get the tags diplay
         $tags = Tags::find()
                // ->where(['user_id' => Yii::$app->user->identity->id])
                ->where(['Skgroup' => 2])
                ->all();

        // EXPLODE THE TIMES
        $working_days = $model->holiday;
        $working_days_array=explode(",", $working_days);

        // get skills. These are the Ids
        $skills_id_array = explode(",", $model->skills);
        $skills_names_array = array(); // array to save the skill names

        // get the skills timetable
        $skills_timetable = $modelSkillstimetable->findByUserId();


        // echo "<pre>";
        // print_r($skills_timetable);
        // echo "</pre>";
        
        // create an array
        // $skills_timetable_array = array();
        // chnage the user ID to name and explode the days column
        foreach ($skills_timetable as $key => $skill_time) {
            $skill_days_array = explode(",", $skill_time->days);
            $skill_name = $modelTags->findTagsById($skill_time->skid); 

            // echo "<pre>";
            // print_r($skill_days_array);
            // echo "</pre>";
            
           // $skills_timetable_array[] = 
           // $skills_timetable_array = array($modelTags->findTagsById($skill_time->skid), $skill_days_array);
           $skills_timetable_array = array($skill_name => $skill_days_array);
           // $skills_timetable_array = array($skill_name,$skill_days_array);

        }


        // echo "<pre>";
        // print_r($skills_timetable_array);
        // echo "</pre>";

        // exit();
        
        
        // get the skill names using Ids gotten above
        foreach ($skills_id_array as $key => $value) {
            $skills_names_array[] = $modelTags->findTagsById($value); // add all the skill names into the array
        }

         return $this->render('home', [
                'model' => $model,
                'working_days_array' => $working_days_array,
                'model_service_name' => $model_service_name,
                'Service_display' => $Service_display,
                'tags_display' => $tags_display,
                'tags' => $tags,
                'user_offices' => $user_offices,
                'skills_names_array' => $skills_names_array,
                'skills_timetable_array' => $skills_timetable_array,
            ]);
    }



  

    /**
     * Deletes an existing Office model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Office model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Office the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Office::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
