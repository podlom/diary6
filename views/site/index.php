<?php

/* @var $this yii\web\View */
/* @var $url string */


$this->title = Yii::$app->name . ' | Home';

?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Wellcome to <?=Yii::$app->name?>!</h1>

        <p class="lead">Here you can plant and log all of your seeds.</p>

        <?php if (Yii::$app->user->isGuest): ?>
            <p>Please <a class="btn btn-lg btn-success" href="/site/login">log in</a> to start.</p>
        <?php else: ?>
            <ul>
                <li><a href="/seed/create">Plant a new seed;</a></li>
                <li><a href="/seed/index">List of planted seeds;</a></li>
                <li><a href="/seed/good">Good seeds planted.</a></li>
            </ul>
        <?php endif; ?>
    </div>
</div>
