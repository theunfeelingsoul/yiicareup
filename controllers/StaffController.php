<?php

namespace app\controllers;

use Yii;
use app\models\Staff;
use app\models\StaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
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
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "careup";
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Staff model.
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
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($get_office_id)
    {
        $this->layout = "careup";
        $model = new Staff();

        if ($model->load(Yii::$app->request->post())) {

            // upload image to folder
            if (!empty(UploadedFile::getInstance($model, 'image_path'))) {
                $model->imageFile = UploadedFile::getInstance($model, 'image_path'); // get image

                // get a random number as the image name
                $img_name = mt_rand();
                $img_path = "img/uploads/staff/".$img_name;
                // save it to the variable 
                $model->image_path = $img_path.'.'.$model->imageFile->extension;
                // upload image to folder
                if (!$model->upload($img_name)) { 

                // todo
                // find a way to add errrs to an array
                }

            }else{
                $model->image_path = "";
            }

            // check if skill_skill is empty fill it with number 12. number 12 is others in the staff skill table
            if (empty($model->staff_skill)) {
                $model->staff_skill = 12;
            }


             // save model
            if ($model->save(false)) {
               
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['office/viewmore', 'id' => $model->office_id]);
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
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = "careup";
        $model                  = $this->findModel($id);
        $first_model_imgname    = $model->image_path;

        if ($model->load(Yii::$app->request->post())) {

            // GET THE IMAGE UPLOADED
            $image_instance= $model->imageFile = UploadedFile::getInstance($model, 'image_path'); // get image

            // UPLOAD IMAGE TO FOLDER
            if ($image_instance) {
              
                $img_name = mt_rand(); // get a random number as the image name
                // Create the directory path where the image will be saved to
                $img_path = "img/uploads/staff/".$img_name;
                // save the directory path created above to the model to be saved
                $model->image_path = $img_path.'.'.$model->imageFile->extension;

                // Upload the image to the directory
                if ($model->upload($img_name) === false) { 
                    echo "アップロードできませんでした。";
                    exit();
                }
            
            // exit();
            }else{
                // if there is no image to be saved, set the previous image path as the model attribute value. 
                $model->image_path=$first_model_imgname;
            }

            // check if skill_skill is empty fill it with number 12. number 12 is others in the staff skill table
            if (empty($model->staff_skill)) {
                $model->staff_skill = 12;
            }

            // save model
            if ($model->save(false)) {
            
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['office/viewmore', 'id' => $model->office_id]);
                exit();
            }else{
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
            }
                
           
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id=false)
    {   
        if (Yii::$app->request->isAjax) {
            $staff_id      = $_POST['id'];

            $this->findModel($staff_id)->delete();

            echo "Deleted";
            exit();
        }else{

            $this->findModel($id)->delete();

            // return $this->redirect(['index']);
            return $this->redirect(['office/viewmore', 'id' => $model->office_id]);

        }
    }

    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
