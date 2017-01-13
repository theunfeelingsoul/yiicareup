<?php

namespace app\controllers;

use Yii;
use app\models\Servicedisplay;
use app\models\ServicedisplaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicedisplayController implements the CRUD actions for Servicedisplay model.
 */
class ServicedisplayController extends Controller
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
     * Lists all Servicedisplay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicedisplaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicedisplay model.
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
     * Creates a new Servicedisplay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Servicedisplay();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Servicedisplay model.
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
     * Deletes an existing Servicedisplay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id=false)
    {
        if (Yii::$app->request->isAjax) {
            $id = $_POST['id'];
             $this->findModel($id)->delete();
             echo "deleted";
             exit();
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        // return $this->redirect(Yii::$app->request->referrer);
    }

     /**
     * Get service_display id by Service Display name, and office id
     * 
     * @param  string $service_name
     * @param  int    $service_office_id 
     * @return int    $service_display['id']
     */
    public function actionAjaxgetid(){

        $model = new Servicedisplay();

        if (Yii::$app->request->isAjax) {
            $service_post_name      = $_POST['name'];
            $service_post_office_id = $_POST['office_id'];

            $service_display = $model->findByServiceDisplayNameAndOfficeId($service_post_name,$service_post_office_id);

            echo $service_display['id'];

            exit();
        }
    }

    /**
     * Finds the Servicedisplay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Servicedisplay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicedisplay::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

      /**
     * Saves the service name into service display table
     * 
     * @param string $_POST['name']
    */
    public function actionAjaxservicetags()
    {

        $model = new Servicedisplay();

        if (Yii::$app->request->isAjax) {

            //  POST request
            // $service_post_name          = $_POST['name'];
            $service_post_office_id     = $_POST['office_id'];
            $service_post_service_id    = $_POST['service_id'];

            // check if it exists in service_display table already
            echo $exists= $model->ServiceDisplayExists($service_post_service_id,$service_post_office_id);   

            // exit();

            // if it dosen't exist save
            if (!$exists) {
                // insert a new row of data
                $Servicedisplay                 = new Servicedisplay();

                $Servicedisplay->user_id        = Yii::$app->user->identity->id;
                $Servicedisplay->service_id     = $service_post_service_id;
                $Servicedisplay->office_id      = $service_post_office_id;

                $Servicedisplay->save(false);
            }

            exit();
         }
    }

} // end class
