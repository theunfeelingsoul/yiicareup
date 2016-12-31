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
use app\models\Officetimetable;

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

    // public $imgx=0;
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
                        'actions' => ['home','create','update','delete','index'],
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
     * Creates a new Office model and uploads the image to the uploads folder.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "careup";

        $model = new Office();

        if ($model->load(Yii::$app->request->post())) {

            // Data from the dropdown list come in array format
            // Change it to a string delimited by commas
            // save it to the respective model attribute
            $model->area    = implode(', ', $model->area);
            $model->service = implode(', ', $model->service);
            $model->skills  = implode(', ', $model->skills);

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
                // echo "did not upload";
                // exit();
                // todo
                // find a way to add errrs to an array
            }
            
            // save model
            if ($model->save(false)) {

                // batch insert office_timetable
                $this -> InstantiateTimesPrep();

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
     * This method is called only after the create() method.
     *
     * Prepares a multidimentional array and then passes the data to 
       the the batchInsertTimes() method that Inserts default data values into the office_timetatble table.
     *
     * The default values are :
        Office_id - the id of the office just created.
        ueser_id  - User id of the logged in user.
        status    - 0.
     */
    public function InstantiateTimesPrep()
    {

        $model                  = new Office();
        $model_office_timetable = new Officetimetable();
        
        $office_id              = Yii::$app->db->getLastInsertID();
        $user_id                = Yii::$app->user->identity->id;

        foreach ($model->times as $key => $value) {

            // the array values below should be arranged as folllows:
            // ['day_and_time', 'user_id', 'status', 'office_id']
            $data[] = [$value,$user_id,'0',$office_id];
        }
        
        // Insert the prepared data array into the table
        // by passing it to the batchInsertTimes() method
        $model_office_timetable->batchInsertTimes($data);
    }

    /**
     * Updates an existing Office model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //Use careup layout
        $this->layout = "careup";


        // 1. GET THE DATA OF RECORD BEING UPDATED
        $model                  = $this->findModel($id);
        $first_model_imgname    = $model->imgname;

        // 2. CHNAGE THE COMMA DELIMITED SERVICE, AREA AND SKILLS STRING DATA TO AN ARRAY 
        $model->service = explode(',', $model->service); 
        $model->area    = explode(',', $model->area); 
        $model->skills  = explode(',', $model->skills); 


        // 3. GET THE POST DATA TO BE UPDATED
        if ($model->load(Yii::$app->request->post())) {

            // 4.   DATA FROM THE DROPDOWN LIST WILL COME IN ARRAY FORMAT
            //      CHANGE IT TO A COMMA DELIMITED STRING
            //      SAVE IT TO THE RESPECTIVE MODEL ATTRIBUTE
            $string_area = $model->area    = implode(', ', $model->area);
            $string_service = $model->service = implode(', ', $model->service);
            $string_skills = $model->skills  = implode(', ', $model->skills);


            // 5.   GET THE IMAGE UPLOADED
            $image_instance= $model->imageFile = UploadedFile::getInstance($model, 'imgname'); // get image

             $model->Onum = '22889';
                    $model->blanktime_s = 22889;
                    $model->blanktime_f = 22889;
                    $model->staff = 22889;
            
            if ($model->validate()) {
                
                // 6.   UPLOAD IMAGE TO FOLDER
                if ($image_instance) {
                  
                    $img_name = mt_rand(); // get a random number as the image name
                    // Create the directory path where the image will be saved to
                    $img_path = "img/uploads/".$img_name;
                    // save the directory path created above to the model to be saved
                    $model->imgname = $img_path.'.'.$model->imageFile->extension;

                    // Upload the image to the directory
                    if ($model->upload($img_name) === false) { 
                        echo "did not upload";
                        exit();
                    }
                
                // exit();
                }else{
                    // if there is no image to be saved, set the previous immage path as the model attribute value. 
                    $model->imgname=$first_model_imgname;
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

                return $this->redirect(['view', 'id' => $model->id]);
            }else{

                // if there is a validation error declare the model again. Because the attribute values will be distored
                // // GET THE DATA OF RECORD BEING UPDATED
                // $model                  = $this->findModel($id);
                // // CHNAGE THE COMMA DELIMITED SERVICE, AREA AND SKILLS STRING DATA TO AN ARRAY 
                $model->service = explode(',', $model->service); 
                $model->area    = explode(',', $model->area); 
                $model->skills  = explode(',', $model->skills); 

                $model->imgname=$first_model_imgname;
                
                // render the update page again
                // this time it will display the errors.
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionHome($id=false)
    {
        // use the careup layout
        // $this->layout = "careup";

        $modelServices          = new Services();
        $modelServiceDisplay    = new Servicedisplay();
        $modelTagsDisplay       = new Tagsdisplay();
        $modelOffice            = new Office();
        $modelTags              = new Tags();
        $modelSkillstimetable   = new Skillstimetable();


        // 0. CHECK IF AT LEAST ONE OFFICE EXISTS FOR THE USER
        // First check if there is at least oe office for the user
        // If there is no office skip everything below and redirect to the create office page

        if ($modelOffice->atLeastOneExists() === FALSE) {
            return $this->redirect(['create']);
            exit();
        }

        // 1. GET DATA OF AN OFFICE
        // find all the office/s ids by user_id
        $user_offices = $modelOffice->findByUserId();

        // get the requested data from the table if ID is given
        // if no ID is given just get the first record
        if ($id) {
            $model = $this->findModel($id);
        }else{
            $model = $this->findModel($modelOffice->findLatestIdByUserId());
        }



        
        // 2. GET THE SERVICE DATA
        // explode the service string
        $model_service_id = explode(',', $model->service); 
        $model_service_name = array();
        // loop through the exploded array, find the records by Sid from services table
        foreach ($model_service_id as $key => $value) {
            // find the records and add them to an array
            $model_service_name[] = $modelServices->findBySid($value);
        }


        // get the service diplay
        $Service_display = $modelServiceDisplay->findByUserIdAndOfficeId($model->id);


        // 3.GET THE TAGS OR SKILLS DATA
        // get the tags diplay - these are the tags that will be displayed front end
        $tags_display = $modelTagsDisplay->findByUserIdAndOfficeId($model->id);


        

                 // get the tags diplay
         $tags = Tags::find()
                // ->where(['user_id' => Yii::$app->user->identity->id])
                ->where(['Skgroup' => 2])
                ->all();


        // 4. GET DATA TO CREATE THE SCHEDULE OR CALENDAR OR TIMETABLE

        // get skills. These are the Ids
        $skills_id_array = explode(",", $model->skills);
        $skills_names_array = array(); // array to save the skill names

        // // get all the skills timetable
        // // by userID only we will sort it out later below
        // $skills_timetable = $modelSkillstimetable->findByUserId();



        // get the skid from the skilltimetable
        $skills_timetable_grouped_by_skid= $modelSkillstimetable->findByUserIdAndOfficeIdAndGropupedBySkid($model->id);

        $new_skilltimetable_array=array();
        // use a loop and change the skid to their corresponding names
        foreach ($skills_timetable_grouped_by_skid as $key => $skid_grouped) {
           // get all the days_and_time by the skid
           $new_skillstimetable_days_and_time = $modelSkillstimetable->findByUserIdAndSkidAndOfficeId($skid_grouped->skid,$model->id);
           
           //get the result set and put the days_and_time in arrays
           foreach ($new_skillstimetable_days_and_time as $key => $new_skill_day_time) {
               $new_skillstimetable_days_and_time_array[] = $new_skill_day_time->day_and_time.'-'.$new_skill_day_time->status;
           }


           // change the skill id to names
           $new_skill_name = $modelTags->findTagsById($skid_grouped->skid); 
           // associate the skill name with the day_and_time arrays
           // $new_skilltimetable_array= array($new_skill_name => $new_skillstimetable_days_and_time_array);

           $new_skilltimetable_array[$new_skill_name]= $new_skillstimetable_days_and_time_array;

           // unset the array
           // because it tsill keeps its value each time it loops
           unset($new_skillstimetable_days_and_time_array);

        }


      
        
        
        // get the skill names using Ids gotten above
        foreach ($skills_id_array as $key => $value) {
            $skills_names_array[] = $modelTags->findTagsById($value); // add all the skill names into the array
        }

        // office timetable
        $office_timetable= $this->officeTimetable($model->id);

      $model->imgx = $model ->imgname;

       // $model->imgx;

        $this->layout = "careup";
       // exit();

         return $this->render('home', [
         // return $this->render('home_back_12_18_2016', [
                'model'                     => $model,
                'model_service_name'        => $model_service_name,
                'Service_display'           => $Service_display,
                'tags_display'              => $tags_display,
                'tags'                      => $tags,
                'user_offices'              => $user_offices,
                'user_office_id'            => $model->id,
                'skills_names_array'        => $skills_names_array,
                'new_skilltimetable_array'  => $new_skilltimetable_array,
                'office_timetable'          => $office_timetable,
            ]);
    }



    public function officeTimetable($office_id){

        $modelOfficetimetable = new Officetimetable();

        // get officetimetable by office id and user_id
        $office_timetable_by_office_id= $modelOfficetimetable->findByUserIdAndOfficeId($office_id);
        $office_timetable_days_and_time_array = array();
        foreach ($office_timetable_by_office_id as $office_time_key => $office_time) {
            $office_timetable_days_and_time_array[] = $office_time->day_and_time.'-'.$office_time->status;
        }

        
        return $office_timetable_days_and_time_array;

        
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
