<?php
namespace app\controllers;

use Yii;
use app\models\Office;
use app\models\OfficeSearch;
use app\models\Servicedisplay;
use app\models\Services;
use app\models\Osaka;
use app\models\Staff;
use app\models\Staffskill;
use app\models\Tagsdisplay;
use app\models\Tags;
use app\models\Skillstimetable;
use app\models\Officetimetable;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\SqlDataProvider;

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
                'only' => ['home','create','update','delete','index','search','view','viewmore','mocksearch','mocksearchresults','join','pagedesignjobdesc'],
                'rules' => [
                    // [
                    //     'allow' => true,
                    //     'actions' => ['login', 'signup'],
                    //     'roles' => ['?'],
                    // ],
                    [
                        'allow' => true,
                        'actions' => ['home','create','update','delete','index','search','view','viewmore','mocksearch','mocksearchresults','join','pagedesignjobdesc'],
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
        //to do 
        // make the index show offices beloging only to a user
        // make the index show all offees if super user
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=15;
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
        $this->layout = "careup-select";

        $model = new Office();
      
        $model->staff = 4;
        $model->user_id = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) &&  $model->validate()) {

           
            // Data from the dropdown list come in array format
            // Change it to a string delimited by commas
            // save it to the respective model attribute
            if (!empty($model->area)) {
                $check_area = $model->area;
                if (empty($check_area[0])) {
                    unset($check_area[0]);
                }

                $model->area    = implode(', ', $check_area);
            }

            if (!empty($model->service)) {
                $check_service = $model->service;
                if (empty($check_service[0])) {
                    unset($check_service[0]);
                }
                
                $model->service    = implode(', ', $check_service);
            }

            if (!empty($model->skills)) {
                $check_skills = $model->skills;
                if (empty($check_skills[0])) {
                    unset($check_skills[0]);
                }
                
                $model->skills    = implode(', ', $check_skills);
            }

            // exit();
            

            

            // add the user id
            $model->user_id = Yii::$app->user->identity->id;
            // upload image to folder
            if (!empty(UploadedFile::getInstance($model, 'imgname'))) {
                $model->imageFile = UploadedFile::getInstance($model, 'imgname'); // get image

                // get a random number as the image name
                $img_name = mt_rand();
                $img_path = "img/uploads/".$img_name;
                // save it to the variable 
                $model->imgname = $img_path.'.'.$model->imageFile->extension;
                // upload image to folder
                if (!$model->upload($img_name)) { 

                // todo
                // find a way to add errrs to an array
                }

            }else{
                $model->imgname = "";
            }

         
            
            
            // save model
            if ($model->save(false)) {

                // batch insert office_timetable
                $this -> InstantiateTimesPrep();
                if (!empty($model->skills)) {
                    # code...
                    $this -> InstantiateSkillsPrep($model->skills,$model->id);
                }

                return $this->redirect(['viewmore', 'id' => $model->id]);
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


    public function preInstantiateCheck($office_id){
         $s = Office::find()
         ->select('skills')
        ->where(['id' => $office_id])
        ->one(); 
        $s['skills'];

        $skills_array=explode(',', $s['skills']);
        $x=array();

        if (!empty($skills_array)) {
            # code...
            foreach ($skills_array as $key => $value) {
               $exists = Skillstimetable::find()
                ->andwhere(['skid' => $value])
                ->andwhere(['office_id' => $office_id])
                ->exists(); 
                // echo $exists;
                if ($exists==0) {
                    $x[]=$value;
                }
            }

            if (!empty($x)) {
                # code...
            $new_skills_string = implode(',', $x);
            $this->InstantiateSkillsPrep($new_skills_string,$office_id);
            }

        }
       
    }

    public function InstantiateSkillsPrep($skills_string,$office_id){
        // check if the skills are already instantiated
        $model_skills_timetable = new Skillstimetable();
        $model = new Office();

        $skills_array = explode(',', $skills_string);
        
        $user_id                = Yii::$app->user->identity->id;
        foreach ($skills_array as $key => $skill_id) {
            
            foreach ($model->times as $key => $value) {
                // the array values below should be arranged as folllows:
                // ['day_and_time','skid', 'user_id', 'status', 'office_id']
                $data[] = [$value,trim($skill_id),$user_id,'0',$office_id];
            }
            
        }

        // Insert the prepared data array into the table
        // by passing it to the batchInsertTimes() method
        $model_skills_timetable->batchInsertSkills($data);
        
    } //  end 


    /**
     * Checks if the office belongs to the logged in user.
     * If it does not user will be redirected to a create page.
     * If it does, nothing happens.
     * @param integer $id
     */
    public function checkIfOfficeBelongsToUser($office_id){
        $model_office = new Office();
        // check if this office belongs to the user - this is a backup
        $office_data_by_id= $model_office -> findByAttribute('id',$office_id);

        $offce_user_id = $office_data_by_id[0]['user_id'];

        if ($offce_user_id != Yii::$app->user->identity->id) {
             return $this->redirect(['create']);
            exit();
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
        //Use careup layout
        $this->layout = "careup-select";
        $modelTags              = new Tags();
        $modelSkillstimetable              = new Skillstimetable();

        $modelOffice            = new Office();
        // find all the office/s ids by user_id
        $user_offices = $modelOffice->findByUserId();
        
        // if office belongs to user, code continues
        // if not user is redirected to create page
        // this is a back up incare any user is redirected here by mistake
        $this->checkIfOfficeBelongsToUser($id);

        // 1. GET THE DATA OF RECORD BEING UPDATED
        $model                  = $this->findModel($id);
        $first_model_imgname    = $model->imgname;

        // 2. CHNAGE THE COMMA DELIMITED SERVICE, AREA AND SKILLS STRING DATA TO AN ARRAY 
         $model->service = explode(',', $model->service); 
                $model->area    = explode(',', $model->area); 
                $model->skills  = explode(',', $model->skills); 


        ####################################################################
        // office timetable
        $office_timetable= $this->officeTimetable($model->id);

         // get skills. These are the Ids
        // check if the sills is empty first
        $skills_names_array = array();
        if (!empty($model->skills)) {
            $skills_id_array = $model->skills;
            // $skills_names_array = array(); // array to save the skill names

             // get the skill names using Ids gotten above
            foreach ($skills_id_array as $key => $skills_id) {
                // $skills_names_array[] = $modelTags->findTagsById($value); // add all the skill names into the array
                // trim the skills_id
                $skills_id = trim($skills_id);
                $skills_names_array[] = array('skill_id'=>$skills_id,'skill_name'=>$modelTags->findTagsById($skills_id)); // add all the skill names into the array
            }
        } // end if

         // 4. GET DATA TO CREATE THE SCHEDULE OR CALENDAR OR TIMETABLE
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

           $new_skilltimetable_array[$new_skill_name]= $new_skillstimetable_days_and_time_array;

           // unset the array
           // because it tsill keeps its value each time it loops
           unset($new_skillstimetable_days_and_time_array);

        }

        ######################################################################


        // 3. GET THE POST DATA TO BE UPDATED
        if ($model->load(Yii::$app->request->post())) {

            // 4.   DATA FROM THE DROPDOWN LIST WILL COME IN ARRAY FORMAT
            //      CHANGE IT TO A COMMA DELIMITED STRING
            //      SAVE IT TO THE RESPECTIVE MODEL ATTRIBUTE
            // $string_area = $model->area    = implode(', ', $model->area);
            // $string_service = $model->service = implode(', ', $model->service);
            // $string_skills = $model->skills  = implode(', ', $model->skills);

            if (!empty($model->area)) {
                $check_area = $model->area;
                if (empty($check_area[0])) {
                    unset($check_area[0]);
                }

                $model->area    = implode(', ', $check_area);
            }

            if (!empty($model->service)) {
                $check_service = $model->service;
                if (empty($check_service[0])) {
                    unset($check_service[0]);
                }
                
                $model->service    = implode(', ', $check_service);
            }

            if (!empty($model->skills)) {
                $check_skills = $model->skills;
                if (empty($check_skills[0])) {
                    unset($check_skills[0]);
                }
               
                $model->skills    = implode(', ', $check_skills);
                  
            }


            // 5.   GET THE IMAGE UPLOADED
            $image_instance= $model->imageFile = UploadedFile::getInstance($model, 'imgname'); // get image

            
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
                        echo "アップロードできませんでした。";
                        exit();
                    }
                
                // exit();
                }else{
                    // if there is no image to be saved, set the previous image path as the model attribute value. 
                    $model->imgname=$first_model_imgname;
                }
                
                 // save model
                if ($model->save(false)) {
                    if (!empty($check_skills)) {
                        # code...
                    $this->preInstantiateCheck($model->id);
                    }
                    // $this->preInstantiateCheck($model->skills,$model->id);
                    return $this->redirect(['viewmore', 'id' => $model->id]);
                    exit();
                }else{
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }

                return $this->redirect(['viewmore', 'id' => $model->id]);
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
                return $this->render('_form', [
                    'model' => $model,
                    'user_offices'              => $user_offices,
                    'user_office_id'            => $model->id,
                    'skills_names_array'        => $skills_names_array,
                    'new_skilltimetable_array'  => $new_skilltimetable_array,
                    'office_timetable'          => $office_timetable,
                ]);
            }
        } else {
            return $this->render('_form', [
                'model' => $model,
                'user_offices'              => $user_offices,
                'user_office_id'            => $model->id,
                'skills_names_array'        => $skills_names_array,
                'new_skilltimetable_array'  => $new_skilltimetable_array,
                'office_timetable'          => $office_timetable,
            ]);
        }
    }
      public function actionUpdatez($id)
    {
        //Use careup layout
        $this->layout = "careup";
        $modelTags              = new Tags();
        $modelSkillstimetable              = new Skillstimetable();

        $modelOffice            = new Office();
        // find all the office/s ids by user_id
        $user_offices = $modelOffice->findByUserId();
        
        // if office belongs to user, code continues
        // if not user is redirected to create page
        // this is a back up incare any user is redirected here by mistake
        $this->checkIfOfficeBelongsToUser($id);

        // 1. GET THE DATA OF RECORD BEING UPDATED
        $model                  = $this->findModel($id);
        $first_model_imgname    = $model->imgname;

        // 2. CHNAGE THE COMMA DELIMITED SERVICE, AREA AND SKILLS STRING DATA TO AN ARRAY 
         $model->service = explode(',', $model->service); 
                $model->area    = explode(',', $model->area); 
                $model->skills  = explode(',', $model->skills); 


        ####################################################################
        // office timetable
        $office_timetable= $this->officeTimetable($model->id);

         // get skills. These are the Ids
        // check if the sills is empty first
        $skills_names_array = array();
        if (!empty($model->skills)) {
            $skills_id_array = $model->skills;
            // $skills_names_array = array(); // array to save the skill names

             // get the skill names using Ids gotten above
            foreach ($skills_id_array as $key => $skills_id) {
                // $skills_names_array[] = $modelTags->findTagsById($value); // add all the skill names into the array
                // trim the skills_id
                $skills_id = trim($skills_id);
                $skills_names_array[] = array('skill_id'=>$skills_id,'skill_name'=>$modelTags->findTagsById($skills_id)); // add all the skill names into the array
            }
        } // end if

         // 4. GET DATA TO CREATE THE SCHEDULE OR CALENDAR OR TIMETABLE
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

           $new_skilltimetable_array[$new_skill_name]= $new_skillstimetable_days_and_time_array;

           // unset the array
           // because it tsill keeps its value each time it loops
           unset($new_skillstimetable_days_and_time_array);

        }

        ######################################################################


        // 3. GET THE POST DATA TO BE UPDATED
        if ($model->load(Yii::$app->request->post())) {

            // 4.   DATA FROM THE DROPDOWN LIST WILL COME IN ARRAY FORMAT
            //      CHANGE IT TO A COMMA DELIMITED STRING
            //      SAVE IT TO THE RESPECTIVE MODEL ATTRIBUTE
            // $string_area = $model->area    = implode(', ', $model->area);
            // $string_service = $model->service = implode(', ', $model->service);
            // $string_skills = $model->skills  = implode(', ', $model->skills);

            if (!empty($model->area)) {
                $check_area = $model->area;
                if (empty($check_area[0])) {
                    unset($check_area[0]);
                }

                $model->area    = implode(', ', $check_area);
            }

            if (!empty($model->service)) {
                $check_service = $model->service;
                if (empty($check_service[0])) {
                    unset($check_service[0]);
                }
                
                $model->service    = implode(', ', $check_service);
            }

            if (!empty($model->skills)) {
                $check_skills = $model->skills;
                if (empty($check_skills[0])) {
                    unset($check_skills[0]);
                }
               
                $model->skills    = implode(', ', $check_skills);
                  
            }
                
                 // save model
                if ($model->save(false)) {
                    if (!empty($check_skills)) {
                        # code...
                    $this->preInstantiateCheck($model->id);
                    }
                    // $this->preInstantiateCheck($model->skills,$model->id);
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
                'user_offices'              => $user_offices,
                'user_office_id'            => $model->id,
                'skills_names_array'        => $skills_names_array,
                'new_skilltimetable_array'  => $new_skilltimetable_array,
                'office_timetable'          => $office_timetable,
            ]);
        }
    }


    public function actionViewmore($id=false)
    {
        // use the careup layout
        $this->layout = "careup";

        $modelServices          = new Services();
        $modelServiceDisplay    = new Servicedisplay();
        $modelTagsDisplay       = new Tagsdisplay();
        $modelOffice            = new Office();
        $modelTags              = new Tags();
        $modelSkillstimetable   = new Skillstimetable();
        $modelStaff             = new Staff();
        $modelStaffSkill        = new Staffskill();


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
        // check if its empty first
        $model_service_name = false;
        if (!empty($model->service)) {
            $model_service_id = explode(',', $model->service); 
            $model_service_name = array();
            // loop through the exploded array, find the records by Sid from services table
            foreach ($model_service_id as $key => $value) {
                // find the records and add them to an array
                $model_service_name[] = $modelServices->findBySid($value);
            }
        } //  end if


        // get the service diplay
        $service_display_data = $modelServiceDisplay->findByUserIdAndOfficeId($model->id);

        $service_display =array();
        foreach ($service_display_data as $key => $service_display_row) {

            $service_display[] = array(
                'service_name'  => $modelServices->getServiceNameByServiceId($service_display_row['service_id']), 
                'id'            => $service_display_row['id'], 
            );
        }


        // 3.GET THE TAGS OR SKILLS DATA
        // get the tags diplay - these are the tags that will be displayed front end
        $tags_display_data = $modelTagsDisplay->findByUserIdAndOfficeId($model->id);

        $tags_display = [];
        foreach ($tags_display_data as $key => $tags_display_row) {
           $tags_display[] = array('tag_name'=>$modelTags->getTagNameByTagId($tags_display_row['tag_id']),'id'=>$tags_display_row['id']);
        }


        // get skills. These are the Ids
        // check if the sills is empty first
        $skills_names_array = array();
        if (!empty($model->skills)) {
            $skills_id_array = explode(",", $model->skills);
            // $skills_names_array = array(); // array to save the skill names

             // get the skill names using Ids gotten above
            foreach ($skills_id_array as $key => $skills_id) {
                // $skills_names_array[] = $modelTags->findTagsById($value); // add all the skill names into the array
                // trim the skills_id
                $skills_id = trim($skills_id);
                $skills_names_array[] = array('skill_id'=>$skills_id,'skill_name'=>$modelTags->findTagsById($skills_id)); // add all the skill names into the array
            }
        } // end if
        

         // 4. GET DATA TO CREATE THE SCHEDULE OR CALENDAR OR TIMETABLE
        // get the skid from the skilltimetable
        $skills_timetable_grouped_by_skid= $modelSkillstimetable->findByUserIdAndOfficeIdAndGropupedBySkid($model->id);

        // echo "<pre>";
        // echo print_r($data);
        // echo "</pre>";
        // exit();
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

           $new_skilltimetable_array[$new_skill_name]= $new_skillstimetable_days_and_time_array;

           // unset the array
           // because it tsill keeps its value each time it loops
           unset($new_skillstimetable_days_and_time_array);

        }


        // office timetable
        $office_timetable= $this->officeTimetable($model->id);

        $model->imgx = $model ->imgname;

        // 5. GET THE STAFF DATA
        $staff_data = $modelStaff->findByOfficeId($model->id);
            // echo "<pre>";
            // print_r($staff_data);
            // echo "</pre>";
            // change the staff skill number into the staff name
            foreach ($staff_data as $staff_data_key => $staff_data_value) {
              
                // make sure its not empty
                if ($staff_data_value['staff_skill']) {
                    // replace the staff skill id with the staff skill name
                    $staff_data_value['staff_skill'] = $modelStaffSkill ->getNameByAttribute('id',$staff_data_value['staff_skill']);
                }

            }

        return $this->render('home', [
            'model'                     => $model,
            'model_service_name'        => $model_service_name,
            'service_display'           => $service_display,
            'tags_display'              => $tags_display,
            'user_offices'              => $user_offices,
            'user_office_id'            => $model->id,
            'skills_names_array'        => $skills_names_array,
            'new_skilltimetable_array'  => $new_skilltimetable_array,
            'office_timetable'          => $office_timetable,
            'staff_data'                => $staff_data,
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
            throw new NotFoundHttpException('ご要望のページは存在しませんでした。');
        }
    }

    public function findServiceNames($office_id){

        $model_service_display  = new Servicedisplay();
        $model_services         = new Services();

        $service_display_rows    = $model_service_display->findByOfficeId($office_id);
        $data                   =false;

        // todo
        // use service id instead of name
        foreach ($service_display_rows as $key => $service_display_row) {
            $data[] = $model_services->getServiceNameByServiceId($service_display_row->service_id);
        }

        if ($data===false) {
            return "サービスがありません。";
        }else{
            $data = implode(',', $data);
        }

    }

    public function findSkillNames($office_id){

        $model_tags_display  = new Tagsdisplay();
        $model_tags          = new Tags();

        $tags_display_rows    = $model_tags_display->findByOfficeId($office_id);
        $data                   =false;

        // todo
        // use service id instead of name
        foreach ($tags_display_rows as $key => $tags_display_row) {
            $data[] = $model_tags->getTagNameByTagId($tags_display_row->tag_id);
        }

        if ($data===false) {
            return "タグはありません";
        }else{
            return $data = implode(',', $data);
        }

    }

    public function findServicesColumn($column){
        $model_service = new Services;
        $allservices    = $model_service->allServices();
        foreach ($allservices as $key => $value) {
           $data[]=$value->$column;
        }

        return $data;

    }



    public function getOfficeIdsFromServiceDisplay($post_array){
      
        $model_service_display = new Servicedisplay();
        // the post array is associative
        // change it to indexed array
        foreach ($post_array as $key => $value) {
            $checked_services[] = $key;
        }

     
        //remoe first array which is Yii form name _csrf
        array_shift($checked_services);
        // remover last array which is the submit name 
        // array_pop($checked_services);

        // find office id of related to each service in the service display model
        foreach ($checked_services as $key => $value) {
            
            $service_display_office_id[] =  $model_service_display->findColumnByAttribute('office_id','service_name',$value);

        }

        $ser_ids=array();
        // the office ids are in a multi-deimentinal array
        // change it to an indexed array
        foreach ($service_display_office_id as $keyw => $valuew) {
            foreach ($valuew as $keyz => $valuez) {
               $ser_ids[] = $valuez['office_id'];
            }
        }

        // there are duplicates in the array. Get only the unique values
        $ser_ids = array_unique($ser_ids);

        return $ser_ids;
    }


    /**
     * 1. he post array is associative
     * 2. Get tag ids from tags model
     * 3. Find office id of related to each tag is in the tags model
     * 4. tag_display_office_id array in a multi-deimentinal array
     * 5. Remove duplicates
     * 
     * @param     string
     * @return     mixed
    */
    public function getOfficeIdsFromTagsDisplay($post_array){
      
        $model_tags_display = new Tagsdisplay();
        $model_tags         = new Tags();

        // 1. the post array is associative
        // change it to indexed array
        foreach ($post_array as $key => $value) {
            $checked_tag_names[] = $key;
        }

     
        // remove first array which is Yii form name _csrf
        array_shift($checked_tag_names);


        // 2. Get tag ids from tags model
        foreach ($checked_tag_names as $checked_tag_name_key => $tag_name) {
            
            $tag_ids[]=$model_tags->findTagSkidBySkname($tag_name);

        }

        // 3. Find office id of related to each tag is in the tags model
        foreach ($tag_ids as $key => $value) {
            
            $tag_display_office_id[] =  $model_tags_display->findByColumn('office_id','tag_id',$value);

        }

        // 4. tag_display_office_id array in a multi-deimentinal array
        // change it to an indexed array
        $office_ids=array();
        foreach ($tag_display_office_id as $keyw => $valuew) {
            foreach ($valuew as $keyz => $valuez) {
               $office_ids[] = $valuez['office_id'];
            }
        }

        // 5. Remove duplicates
        $office_ids = array_unique($office_ids);
       

        return $office_ids;
    }



    /**
     * Search databse by office, service, tag/skill, office timetable
     * 
    */
    // public function actionOldSearch($submit=false)
    // {

    //     $this->layout           = "careup";

    //     $model                  = new Office();
    //     $model_service          = new Services();
    //     $model_service_display  = new Servicedisplay();
    //     $searchModel            = new OfficeSearch();

    //     $resultsModel           = '';
    //     $search_results         = false;
    //     $modalphp               ="";
       
    //     // group the services 
    //     // for the services checkboxes
    //     $sgroup_and_services = $this->groupServices();

    //     //todo
    //     // locations / Osaka
    //     $locations = $this->groupOsaka();

    //     //find tags
    //     $skgroup_and_tags = $this->groupTags();



    //     return $this->render('search', [
    //         'model'                 => $model,
    //         'modalphp'              => $modalphp,
    //         'search_results'        => $search_results,
    //         'sgroup_and_services'   => $sgroup_and_services,
    //         'skgroup_and_tags'      => $skgroup_and_tags,
    //         'locations'             => $locations,
    //     ]);
    // }


    /**
     * Group the Services by the column Sgroup in the services table
     * 
     * @return     mixed
    */
    public function groupServices(){

        $model_service  = new Services();
        // 1. FIND THE SGROUPS IN THE TABLE
        $services_distinct_by_sgroup = $model_service->findDistinctByAttribute('Sgroup');

        // 2. ADD THE GROUP NAME I.E ATTRIBUTE TO AN ARRAY AND ASSOCIATE IT WIL THE SERVICES IN THAT GROUP 
        foreach ($services_distinct_by_sgroup as $key => $value) {
            /*

            array('Sattribute'=>array('Sname'))

            */
            $sgroup_and_services[]= array(
                    $model_service->findSattributeByAttribute('Sgroup',$value->Sgroup) =>$model_service->findBySgroup($value->Sgroup)
            );
        }

        return $sgroup_and_services;

    } // end groupServices()


    /**
     * Group the tags in tags table by the skgroup. 
     * And associate them in a array
     * 
     * @return     mixed
    */
    public function groupTags(){

        $model_tags          = new Tags();
        $model_services          = new Services();
        // get the services in groups
        // get distinct group
        // get all the names in in the group
        // $model_services=findAll();
        $tags_distinct_by_skgroup=$model_tags->findDistinctByAttribute('Skgroup');


        foreach ($tags_distinct_by_skgroup as $key => $value) {
            $skgroup_and_skname[]= array(
                $model_services->findSattributeByAttribute('Sgroup',$value->Skgroup) =>
                $model_tags->findByColumn('Skname','Skgroup',$value->Skgroup)
            );
        }

        return $skgroup_and_skname;

    } // end groupTags()

    public function groupOsaka(){
        $model_osaka  = new Osaka();
        // get the services in groups
        // get distinct group
        // get all the names in in the group
        // $model_services=findAll();
        $osaka_cattributes = $model_osaka->findDistinctCattributes();

        foreach ($osaka_cattributes as $key => $value) {
           
            $cattribute_and_cname[] = array(
                $value->Cattribute => $model_osaka->findCnamesByCattribute($value->Cattribute)
                );
            // $arrayName = array('' => , );
        }

        return $cattribute_and_cname;
    } // end groupServices()


    public function actionOfficesearch(){
        $this->layout = "careup";
        $model        = new Office();
        $model_office_timetable        = new Officetimetable();

        // group the services 
        // for the services checkboxes
        $sgroup_and_services = $this->groupServices();

        // locations / Osaka
        $locations = $this->groupOsaka();

        //find tags
        $skgroup_and_tags = $this->groupTags();


        $search_results = false; 
        // search by busniess name
        if ($model->load(Yii::$app->request->post())) {
            $modalphp = "yes-open";
            if ($model->Oname) {
                $data = $model->findLikeAttribute('Oname',$model->Oname);

                foreach ($data as $key => $value) {
                    $search_results[] = $arrayName = array(
                        'oname'     => $value->Oname, 
                        'img'       => $value->imgname, 
                        'appeal'    => $value->apeal, 
                        'id'        => $value->id, 
                        'services'  => $this->findServiceNames($value->id), 
                        'skills'    => $this->findSkillNames($value->id), 
                        'area'      => $this->findAreaNames($value->area), 
                        );
                }
            }
        return $this->render('mocksearchresults', [
                'model'                 => $model,
                'modalphp'              => $modalphp,
                'search_results'        => $search_results,
                'sgroup_and_services'   => $sgroup_and_services,
                'skgroup_and_tags'      => $skgroup_and_tags,
                'locations'             => $locations,
                'model_office_timetable'             => $model_office_timetable,
            ]);
        }else{
            return $this->redirect(['mocksearch']);
        }
    } // end officeSearchoffice()


    public function findAreaNames($area_id_string){
        $model_osaka = new Osaka();
        $area_id_array = explode(',', $area_id_string);
        $data =array();

        // echo "<pre>";
        // print_r($area_id_array);
        // echo "</pre>";
        // exit();
        foreach ($area_id_array as $key => $value) {
            // echo $value;
            // exit();  
            $data[] = $arrayName =array($model_osaka->getAreaNameById($value));
        }

        return $data;
    }


    /**
     * Search for offices according to the service it has
     * 
     * @param   mixed $_POST
    */
    public function actionServicesearch()
    {   
        // change the layout
        $this->layout = "careup";

        $model        = new Office();

        // 1. check if a $_POST request has been sent.
        if (count($_POST)>1) {

            // set the modla class name
            $modalphp = "yes-open";
            
            // get the office ids form service display using the service names
            $service_ids_=$this->getOfficeIdsFromServiceDisplay($_POST);

            $search_results = false;
            // find the office data
            foreach ($service_ids_ as $key => $office_id) {
                $office_m=$model->findByAttribute('id',$office_id);

                foreach ($office_m as $key => $o) {
                    $search_results[] = array(
                        'oname'     => $o->Oname, 
                        'img'       => $o->imgname, 
                        'appeal'    => $o->apeal, 
                        'id'        => $o->id, 
                        'services'  => $this->findServiceNames($office_id), 
                        );
                }
               
            }

            // group the services 
            // for the services checkboxes
            $sgroup_and_services = $this->groupServices();

            // locations / Osaka
            $locations = $this->groupOsaka();

            //find tags
            $skgroup_and_tags = $this->groupTags();


            return $this->render('search', [
                'model'                 => $model,
                'modalphp'              => $modalphp,
                'search_results'        => $search_results,
                'sgroup_and_services'   => $sgroup_and_services,
                'skgroup_and_tags'      => $skgroup_and_tags,
                'locations'             => $locations,
            ]);
           
        }else{
            return $this->redirect(['search']);
        }
        
    } // end actionServicesearch()

    public function actionOfficetimetablesearch(){
        
        $this->layout = "careup";
        $model                  = new Office();
        $model_office_timetable = new Officetimetable();

        // remove first array - crsf
        array_shift($_POST);


        // 1. check if a $_POST request has been sent.
        if (count($_POST)>1) {
            
            // find office id in office_timetable 
            foreach ($_POST as $day_and_time => $check_box_value) {
                $office_timetable_data_array = $model_office_timetable->findByAttribute('day_and_time',$day_and_time);
                $office_timetable_office_ids_array = array();
                foreach ($office_timetable_data_array as $key => $office_timetable_data) {
                    $office_timetable_office_ids_array[] = $office_timetable_data['office_id'];
                }

               
            } // end foreach

            $office_timetable_office_no_duplicates_ids_array = array_unique($office_timetable_office_ids_array);

            $search_results = false;
            // find the search data in office table using the ids
            foreach ($office_timetable_office_no_duplicates_ids_array as $key => $office_id) {
                $office_single = $model->findByAttribute('id',$office_id);

                $search_results[] = array(
                    'oname'     => $office_single[0]['Oname'], 
                    'img'       => $office_single[0]['imgname'], 
                    'appeal'    => $office_single[0]['apeal'], 
                    'id'        => $office_single[0]['id'], 
                    'services'  => $this->findServiceNames($office_id), 
                );
            }

            // group the services 
            // for the services checkboxes
            $sgroup_and_services = $this->groupServices();

            // locations / Osaka
            $locations = $this->groupOsaka();

            //find tags
            $skgroup_and_tags = $this->groupTags();

            // result modla class    
            $modalphp = "yes-open";

            return $this->render('search', [
                    'model'                 => $model,
                    'modalphp'              => $modalphp,
                    'search_results'        => $search_results,
                    'sgroup_and_services'   => $sgroup_and_services,
                    'skgroup_and_tags'      => $skgroup_and_tags,
                    'locations'             => $locations,
                ]);
        }else{
            return $this->redirect(['search']);
        }


    } // end actionOfficetimetablesearch()

    public function actionTagsearch(){
        $this->layout = "careup";
        $model        = new Office();

        // search by services
        // check if any data is sent.
        if (count($_POST)>1) {
            
            $modalphp = "yes-open";
            
            // get the office ids form service display using the service names
            $tag_display_office_ids=$this->getOfficeIdsFromTagsDisplay($_POST);

            $search_results=false;
            // find the office data
            foreach ($tag_display_office_ids as $key => $office_id) {
                $office_m=$model->findByAttribute('id',$office_id);

                foreach ($office_m as $key => $o) {
                    $search_results[] = array(
                        'oname'     => $o->Oname, 
                        'img'       => $o->imgname, 
                        'appeal'    => $o->apeal, 
                        'id'        => $o->id, 
                        'services'    => $this->findServiceNames($office_id), 
                        );
                }
               
            }

            // group the services 
            // for the services checkboxes
            $sgroup_and_services = $this->groupServices();

            // locations / Osaka
            $locations = $this->groupOsaka();

            //find tags
            $skgroup_and_tags = $this->groupTags();

            return $this->render('search', [
                'model'                 => $model,
                'modalphp'              => $modalphp,
                'search_results'        => $search_results,
                'sgroup_and_services'   => $sgroup_and_services,
                'skgroup_and_tags'      => $skgroup_and_tags,
                'locations'             => $locations,
            ]);
           
        }else{
            return $this->redirect(['search']);
        } // end if else
        
    } // end actionSkillsearch()

   

    public function getDistinctAreas($checked_location_ids){
        // get all the office data
        $area_column = Office::find()
        ->all();

        // create an multidimention array
        // the key is the office id 
        // the second dimention array is the area ids
        foreach ($area_column as $key => $area_row) {
            $area_multi_array[$area_row->id]=explode(',',$area_row->area);
        }

        $office_ids = array();
        // check the above multidimention array 
        // if the area ids correlate to $checked_location_ids array then add them to an array
        foreach ($area_multi_array as $office_id_key => $value) {
            foreach ($value as $key => $v) {
                if (in_array($v, $checked_location_ids)==true) {
                    $office_ids[]=$office_id_key;
                }
            }
        }
        
        // remove duplicates
        $office_ids = array_unique($office_ids);
        
        return $office_ids;
    }

    public function actionLocationsearch(){
        $this->layout = "careup";
        $model        = new Office();

        // search by services
        // check if any data is sent.
        if (count($_POST)>1) {

            // this is the class for the bottom modal
            $modalphp = "yes-open";

            // the post array is associative
            // change it to indexed array
            foreach ($_POST as $key => $value) {
                $checked_location_ids[] = $key;
            }

            //remove the first array which is Yii the form name '_csrf'
            unset($checked_location_ids[0]);
            // array_shift($checked_location_ids);

            // get the 
            $areas = $this->getDistinctAreas($checked_location_ids);

            $search_results = false;
            // find the office data
            foreach ($areas as $key => $office_id) {
                $office_m=$model->findByAttribute('id',$office_id);

                foreach ($office_m as $key => $o) {
                    $search_results[] = array(
                        'oname'     => $o->Oname, 
                        'img'       => $o->imgname, 
                        'appeal'    => $o->apeal, 
                        'id'        => $o->id, 
                        'services'  => $this->findServiceNames($office_id), 
                        );
                }
            }

            // group the services 
            // for the services checkboxes
            $sgroup_and_services = $this->groupServices();

            // locations / Osaka
            $locations = $this->groupOsaka();

            //find tags
            $skgroup_and_tags = $this->groupTags();

            return $this->render('search', [
                'model'                 => $model,
                'modalphp'              => $modalphp,
                'search_results'        => $search_results,
                'sgroup_and_services'   => $sgroup_and_services,
                'skgroup_and_tags'      => $skgroup_and_tags,
                'locations'             => $locations,
            ]);
           
        }else{
            return $this->redirect(['search']);
        }
        
    } // end actionLocationsearch()


    public function actionWhichedit(){
        $this->layout = "careup";

        return $this->render('whichedit', [
  
        ]);
    } // end actionWhichedit()



    public function actionSearch(){

        $this->layout           ="careup";
        $model                  = new Office();
        $model_office_timetable = new Officetimetable();

        $modelTags = new Tags();
        $group_tags = $this->groupTags();


        if ($model->load(Yii::$app->request->post())) {
            

            // Start the query
            // 1. Find all from office
            $query = Office::find();

            if ($model->Oname) {
                
                echo $model->Oname;

                $query->Where(['like', 'Oname', $model->Oname]);
            }

            // 2. If user chooses an office time
            // -- First create a join
            // -- Then create the or query  
            if ($model_office_timetable->load(Yii::$app->request->post())) { 
                if ($model_office_timetable->day_and_time) 
                {

                    $i = 0; // instatiate the counter

                    // go through all the checkboxes
                    foreach ($model_office_timetable->day_and_time as $key => $day_and_time_value) 
                    {   
                        // all the unchecked chekboxes will have a value of 0
                        // checked chekboxes will have the day_and_time value
                        if ($day_and_time_value!= '0') 
                        {   
                            $i++; // add the coounter
                            // wanted to do it just once. Didnt know how to add a break.
                            // used this way instead. It works though :)
                            if ($i==1) {
                                $query->joinWith('office_timetable', false, 'JOIN');
                            }
                           
                            // create the 'or' query
                            $query->orFilterWhere(['or',['like', 'day_and_time', $day_and_time_value]]);
                        }
                       
                       
                    }
                }
            }
           

            // 3. If user chooses a service
            if ($model->service) 
            {
                echo $model->service;
                // ceate the Join
                $query->joinWith('service_display', false, 'JOIN');
                
                // create the 'or' query
                $query->orFilterWhere(['or',['like', 'service_id', $model->service]]);
            }

            

            // 4. If user chooses a skill
            // -- First create a join
            // -- Then create the or query
            if ($model->skills) {

                $x = 0; // instatiate the counter
                // go through all the checkboxes
                foreach ($model->skills as $key => $skills_value) {
                    // all the unchecked chekboxes will have a value of 0
                    // checked chekboxes will have the day_and_time value
                    if ($skills_value != 0) {

                        $x++;// add the coounter
                        // wanted to do it just once. Didnt know how to add a break.
                        // used this way instead. It works though :)
                        // add the join
                        if ($x==1) {
                            $query->joinWith('tags_display', false, 'JOIN');
                        }
                        echo $skills_value;
                        echo "<br/>";
                        // create the or query
                        $query->orFilterWhere(['or',['like', 'tag_id', $skills_value]]);
                    }
                }
            }

            
            // 5. If user chooses an area
            // -- create the or query
          
            if ($model->area) {
                foreach ($model->area as $key => $area_value) {
                    if ($area_value != 0) {
                       
                        echo $area_value;
                        echo "<br/>";
                        $query->orFilterWhere(['or',['like', 'area', $area_value]]);
                    }
                    
                }
            }

        
            // echo $query->createCommand()->sql;
            // exit();
            // 6. finnish the long query lol
            $query_results= $query->all();

            $search_results = array();
            
            foreach ($query_results as $key => $value) {
                    $search_results[] = $arrayName = array(
                        'oname'     => $value->Oname, 
                        'img'       => $value->imgname, 
                        'appeal'    => $value->apeal, 
                        'id'        => $value->id, 
                        'services'  => $this->findServiceNames($value->id), 
                        'skills'    => $this->findSkillNames($value->id), 
                        'area'      => $this->findAreaNames($value->area), 
                        );
                }

            return $this->render('m', [
                'model'                 => $model,
                'model_office_timetable'      => $model_office_timetable,
                'search_results'      => $search_results,
                'group_tags'      => $group_tags,
            ]);

        }
         //find tags
        $skgroup_and_tags = $this->groupTags();
        return $this->render('m', [
            'model'                 => $model,
            // 'skgroup_and_tags'      => $skgroup_and_tags,
            'model_office_timetable'      => $model_office_timetable,
            'group_tags'      => $group_tags,
        ]);
    }

 
    public function actionMocksearchresults()
    {
        $this->layout="careup";
        $skgroup_and_tags = $this->groupTags();
        return $this->render('mocksearchresults', [
        'skgroup_and_tags'      => $skgroup_and_tags,
        ]);
    }


    public function actionJoin(){
        facebook_posts::find()->joinWith('fans')->joinWith(['comments', 'comments.fan'])->all();

        return $this->render('join', [
    
        ]);
    }

    public function actionPagedesignjobdesc()
    {
        $this->layout="careup";
        return $this->render('jobdesc', [
        
        ]);
    }

    public function actionPagedesignjobdetails(){
        $this->layout="careup";
        return $this->render('jobdetails', [
        
        ]);
    }


} // end class
