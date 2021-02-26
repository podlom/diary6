<?php

/* @var $this yii\web\View */
/* @var $model app\models\Seed */
/* @var $virtue array */
/* @var $time string */
/* @var $date string */
/* @var $userId int */


$this->title = Yii::$app->name . ' | Home';

?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Wellcome to <?=Yii::$app->name?>!</h1>

        <p class="lead">Here you can plant and log all of your seeds.</p>

        <?php if (Yii::$app->user->isGuest): ?>
            <p>Please <a class="btn btn-lg btn-success" href="/site/login">log in</a> to start.</p>
        <?php else:
            include 'seed.php';
        endif; ?>
    </div>
</div>
