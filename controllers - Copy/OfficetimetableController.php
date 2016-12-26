<?php

namespace app\controllers;

use Yii;
use app\models\Officetimetable;
use app\models\OfficetimetableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OfficetimetableController implements the CRUD actions for Officetimetable model.
 */
class OfficetimetableController extends Controller
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
     * Lists all Officetimetable models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OfficetimetableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Officetimetable model.
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
     * Creates a new Officetimetable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Officetimetable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Officetimetable model.
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
     * Deletes an existing Officetimetable model.
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
     * Finds the Officetimetable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Officetimetable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Officetimetable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionAjaxofficetimenotavailable()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $day        = $_POST['day'];
            $user_id    = $_POST['user_id'];
            $office_id  = $_POST['office_id'];

            $modelOfficetimetable = new Officetimetable();

            // check if it exists in office_timetable table 
            $exists= $modelOfficetimetable->exists($day,$office_id);

            // if it doesnt exist it will create it
            // if it does it will update it

            if ($exists) {

                $modelOfficetimetable = $modelOfficetimetable->findByDayAndOfficeId($day,$office_id); 

                $modelOfficetimetable->status = "1";
                $modelOfficetimetable->save(); // update

                // print_r($modelSkillstimetable->getErrors());

                echo "available";
            }else{

                $modelOfficetimetable->day_and_time = $day;
                $modelOfficetimetable->user_id      = $user_id;
                $modelOfficetimetable->status       = "1";
                $modelOfficetimetable->office_id    = $office_id;

                $modelOfficetimetable->save(); // create/save

                // print_r($modelSkillstimetable->getErrors());


                echo "created available";
            }

            exit();
         }

    } // end AjaxSkilltimetable()


    public function actionAjaxofficetimeavailable()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $day        = $_POST['day'];
            $user_id    = $_POST['user_id'];
            $office_id  = $_POST['office_id'];

            $modelOfficetimetable = new Officetimetable();

            $modelOfficetimetable = $modelOfficetimetable->findByDayAndOfficeId($day,$office_id); 

                $modelOfficetimetable->status = "2";
                $modelOfficetimetable->save(); // update

                // print_r($modelOfficetimetable->getErrors());


                echo "Maybe";

            exit();
         }

    } // end Ajaxtimeavailable()


     public function actionAjaxofficetimemaybeavailable()
    {

        if (Yii::$app->request->isAjax) {

            //  POST request
            $day        = $_POST['day'];
            $user_id    = $_POST['user_id'];
            $office_id  = $_POST['office_id'];

            $modelOfficetimetable = new Officetimetable();

            $modelOfficetimetable = $modelOfficetimetable->findByDayAndOfficeId($day,$office_id); 

            $modelOfficetimetable->status = "0";
            $modelOfficetimetable->save(); // update

            echo "Not Available";

            exit();
         }

    } // end Ajaxtimemaybeavailable()

} // end class
