<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Seed;
use app\models\Virtue;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $virtue = Virtue::getVirtuesAsArray();

        if (Yii::$app->request->getIsPost()) {
            $model = new Seed();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    \Yii::$app->getSession()->setFlash('success', 'I have logged your seed successfully.');
                }
            }
        }

        $model = new Seed();
        $time = date('H:i:s');
        $date = date('Y-m-d');
        $userId = Yii::$app->user->getId();

        return $this->render('index', [
            'model' => $model,
            'virtue' => $virtue,
            'time' => $time,
            'date' => $date,
            'userId' => $userId,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @return string
     */
    public function actionGoodSeeds()
    {
        $userId = Yii::$app->user->getId();
        $seedsData = Seed::getGoodSeedsAsArray($userId);
        $numGoodSeeds = Seed::getNumGoodSeeds($userId);

        return $this->render('good-seeds', [
            'userId' => $userId,
            'seedsData' => $seedsData,
            'numGoodSeeds' => $numGoodSeeds,
        ]);
    }
}
