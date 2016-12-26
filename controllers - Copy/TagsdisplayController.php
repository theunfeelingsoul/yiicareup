<?php

namespace app\controllers;

use Yii;
use app\models\Tagsdisplay;
use app\models\TagsdisplaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TagsdisplayController implements the CRUD actions for Tagsdisplay model.
 */
class TagsdisplayController extends Controller
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
     * Lists all Tagsdisplay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagsdisplaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tagsdisplay model.
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
     * Creates a new Tagsdisplay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tagsdisplay();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tagsdisplay model.
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
     * Deletes an existing Tagsdisplay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id = false)
    {   

        if (Yii::$app->request->isAjax) {
            $id = $_POST['id'];
            $this->findModel($id)->delete();
            echo "deleted";
            exit();
        }


        $this->findModel($id)->delete();

        // return $this->redirect(['index']);
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Tagsdisplay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tagsdisplay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tagsdisplay::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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
            $tag_post_office_id = $_POST['office_id'];

            $modelTagsDisplay = new Tagsdisplay();

            // check if the given tag_name exists in tags_display table
            echo $exists = $modelTagsDisplay->tagNameExists($tag_post_name,$tag_post_office_id); 

            // if it dosen't exts sane
            if (!$exists) {
                // insert a new row of data
                $modelTagsDisplay->tag_name     = $tag_post_name;
                $modelTagsDisplay->office_id    = $tag_post_office_id;
                $modelTagsDisplay->user_id      = Yii::$app->user->identity->id;
                $modelTagsDisplay->save(false);
            }

            exit();
         }
    }


    public function actionAjaxgetid(){

        $model = new Tagsdisplay();

        if (Yii::$app->request->isAjax) {
            $service_post_name      = $_POST['name'];
            $service_post_office_id = $_POST['office_id'];

            $service_display = $model->findByServiceDisplayNameAndOfficeId($service_post_name,$service_post_office_id);

            echo $service_display['id'];


            exit();


        }
    }
} // end class
