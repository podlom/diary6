<?php

/* @var $this yii\web\View */
/* @var $seedsData array */

use yii\helpers\Html;

$this->title = 'Good seeds plated';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <code><?= var_export($seedsData, true) ?></code>
</div>
