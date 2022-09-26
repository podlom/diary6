<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seed */
/* @var $virtue array */
/* @var $time string */
/* @var $date string */
/* @var $userId int */

$this->title = Yii::t('app', 'Update the Seed: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

?>
<div class="seed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'   => $model,
        'virtue'  => $virtue,
        'date'    => $date,
        'time'    => $time,
        'userId'  => $userId,
    ]) ?>

</div>
