<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seed */
/* @var $virtue array */
/* @var $time string */
/* @var $date string */
/* @var $userId int */

$this->title = Yii::t('app', 'Plant a Seed');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="seed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'   => $model,
        'virtue'  => $virtue,
        'date'    => $date,
        'time'    => $time,
        'userId'  => $userId,
        'isPositive' => true,
    ]) ?>

</div>
