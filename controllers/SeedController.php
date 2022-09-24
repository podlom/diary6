<?php

namespace app\controllers;


use Yii;
use app\models\Seed;
use app\models\SeedSearch;
use app\models\Virtue;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * SeedController implements the CRUD actions for Seed model.
 */
class SeedController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Seed models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seed model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Seed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $userId = Yii::$app->user->getId();
        $virtue = Virtue::getVirtuesAsArray();
        $model = new Seed();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model'   => $model,
            'virtue'  => $virtue,
            'date'    => $date,
            'time'    => $time,
            'userId'  => $userId,
        ]);
    }

    /**
     * Updates an existing Seed model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $userId = Yii::$app->user->getId();
        $virtue = Virtue::getVirtuesAsArray();
        $model = $this->findModel($id);
        $date = $model->seed_date;
        $time = $model->seed_time;

        Yii::info(__METHOD__ . ' +' . __LINE__ . ' POST data: ' . var_export(Yii::$app->request->post(), true));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model'   => $model,
            'virtue'  => $virtue,
            'date'    => $date,
            'time'    => $time,
            'userId'  => $userId,
        ]);
    }

    /**
     * Deletes an existing Seed model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seed::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * @return string
     */
    public function actionGood()
    {
        $virtue = Virtue::getVirtuesAsArray();
        $userId = Yii::$app->user->getId();
        $seedsData = Seed::getGoodSeedsAsArray($userId);
        $numSeeds = Seed::getNumSeeds($userId);
        $numGoodSeeds = Seed::getNumGoodSeeds($userId);

        return $this->render('good', [
            'virtue' => $virtue,
            'userId' => $userId,
            'seedsData' => $seedsData,
            'numSeeds' => $numSeeds,
            'numGoodSeeds' => $numGoodSeeds,
        ]);
    }
}
