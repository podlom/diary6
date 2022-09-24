<?php

namespace app\controllers;


use Yii;
use app\models\Seed;
use app\models\Virtue;


class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSeeds()
    {
        return $this->render('seeds');
    }
}
