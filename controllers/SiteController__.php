<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // return $this->render('index');
        return $this->redirect(['office/index']);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = "home";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
            // return $this->redirect(['office/index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
        // return $this->goHome();
    }

     /**
     * Signup action.
     *
     * @return string
     */
    public function actionSignup()
    {
        $this->layout = "careup_signup";
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->sendMail(Yii::$app->params['adminEmail'])) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
//                    メール送信
                    Yii::$app->session->setFlash('contactFormSubmitted');

//                    登録成功画面へ
                    return $this->render('success');
                }
            }
        }

//        if ($model->sendMail(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays success signup page.
     *
     * @return string
     */
    public function actionSuccess()
    {
        $this->layout = "careup_signup";
        return $this->render('success');
    }

        /**
     * Displays UsePolicy page.
     *
     * @return string
     */
    public function actionUsepolicy()
    {
        $this->layout = "careup_signup";
        return $this->render('usepolicy');
    }

        /**
     * Displays PrivatePolicy page.
     *
     * @return string
     */
    public function actionPrivacypolicy()
    {
        $this->layout = "careup_signup";
        return $this->render('privacypolicy');
    }
}
