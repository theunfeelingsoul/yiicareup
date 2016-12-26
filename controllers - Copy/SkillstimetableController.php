<?php

namespace app\controllers;

use Yii;
use app\models\Skillstimetable;
use app\models\SkillstimetableSearch;
use app\models\Tags;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SkillstimetableController implements the CRUD actions for Skillstimetable model.
 */
class SkillstimetableController extends Controller
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
        ];
    }

    /**
     * Lists all Skillstimetable models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkillstimetableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Skillstimetable model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Skillstimetable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Skillstimetable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Skillstimetable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Skillstimetable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**      * Finds the Skillstimetable model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.      *
@param integer $id      * @return Skillstimetable the loaded model      *
@throws NotFoundHttpException if the model cannot be found      */ protected
function findModel($id)     {         if (($model =
Skillstimetable::findOne($id)) !== null) {             return $model; } else {
throw new NotFoundHttpException('The requested page does not exist.'); }     }

    public function actionAjaxtimenotavailable()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $skill_class      = $_POST['skill'];
            $day_class        = $_POST['day'];
            $user_id_class    = $_POST['user_id'];
            $office_id_class  = $_POST['office_id'];

            $modelSkillstimetable = new Skillstimetable();
            $modelTags = new Tags();

            // check if it exists in service_display table already
            // TODO
            // chnage the skill name to id
            $skill_id=$modelTags->findTagSkidBySkname($skill_class);
            // use it to chekc if exists
            // 
            $exists= $modelSkillstimetable->Exists($skill_id,Yii::$app->user->identity->id,$day_class,$office_id_class);

            // if it doesnt exist it will create it
            // if it does it will update it

            // if it exist save
            if ($exists) {

                $modelSkillstimetable = $modelSkillstimetable->findByUserIdAndSkidAndDayAndTimeAndOfficeId($skill_id,$day_class,$office_id_class); 



                $modelSkillstimetable->status = "1";
                $modelSkillstimetable->save();

                print_r($modelSkillstimetable->getErrors());

                //  echo "<pre>";
                // print_r($modelSkillstimetable);
                // echo "</pre>";
                
                // exit();

                echo "available";
            }else{

                $modelSkillstimetable->day_and_time = $day_class;
                $modelSkillstimetable->skid         = $skill_id;
                $modelSkillstimetable->user_id      = $user_id_class;
                $modelSkillstimetable->status       = "1";
                $modelSkillstimetable->office_id    =$office_id_class;
                $modelSkillstimetable->save();

                print_r($modelSkillstimetable->getErrors());

                //  echo "<pre>";
                // print_r($modelSkillstimetable);
                // echo "</pre>";
                
                // exit();

                echo "created available";
            }

            exit();
         }

    } // end AjaxSkilltimetable()


    public function actionAjaxtimeavailable()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $skill_class      = $_POST['skill'];
            $day_class        = $_POST['day'];
            $user_id_class    = $_POST['user_id'];
            $office_id_class  = $_POST['office_id'];

            $modelSkillstimetable = new Skillstimetable();
            $modelTags = new Tags();

            // check if it exists in service_display table already
            // TODO
            // chnage the skill name to id
            $skill_id=$modelTags->findTagSkidBySkname($skill_class);
            // use it to chekc if exists
            // 
            $exists= $modelSkillstimetable->Exists($skill_id,Yii::$app->user->identity->id,$day_class,$office_id_class);

            // if it doesnt exist it will create it
            // if it does it will update it

            // if it dosen't exist save
            // if ($exists) {

            $modelSkillstimetable = $modelSkillstimetable->findByUserIdAndSkidAndDayAndTimeAndOfficeId($skill_id,$day_class,$office_id_class); 



                $modelSkillstimetable->status = "2";
                $modelSkillstimetable->save();

                print_r($modelSkillstimetable->getErrors());

                //  echo "<pre>";
                // print_r($modelSkillstimetable);
                // echo "</pre>";
                
                // exit();

                echo "Maybe";
            // }

            exit();
         }

    } // end Ajaxtimeavailable()

    public function actionAjaxtimemaybeavailable()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $skill_class      = $_POST['skill'];
            $day_class        = $_POST['day'];
            $user_id_class    = $_POST['user_id'];
             $office_id_class  = $_POST['office_id'];

            $modelSkillstimetable = new Skillstimetable();
            $modelTags = new Tags();

            // check if it exists in service_display table already
            // TODO
            // chnage the skill name to id
            $skill_id=$modelTags->findTagSkidBySkname($skill_class);
            // use it to chekc if exists
            // 
            $exists= $modelSkillstimetable->Exists($skill_id,Yii::$app->user->identity->id,$day_class,$office_id_class);

            // if it doesnt exist it will create it
            // if it does it will update it

            // if it dosen't exist save
            // if ($exists) {

                $modelSkillstimetable = $modelSkillstimetable->findByUserIdAndSkidAndDayAndTimeAndOfficeId($skill_id,$day_class,$office_id_class); 



                $modelSkillstimetable->status = "0";
                $modelSkillstimetable->save();

                print_r($modelSkillstimetable->getErrors());

                //  echo "<pre>";
                // print_r($modelSkillstimetable);
                // echo "</pre>";
                
                // exit();

                echo "Not Available";
            // }

            exit();
         }

    } // end Ajaxtimemaybeavailable()




} // end class
