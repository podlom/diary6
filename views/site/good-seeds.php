<?php

/* @var $this yii\web\View */
/* @var $seedsData array */

use yii\helpers\Html;

$this->title = 'Good seeds planted';
// $this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-good-seeds">
    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table-responsive">
        <tr><th>ID #</th><th>Virtue Name</th><th>Count Good Seeds Planted</th></tr>
    <?php
        $htmlData = '';
        foreach ($seedsData as $s1) {
            $htmlData .= '<tr><td class="text-center">' . $s1['virtue_id'] . '</td><td>' . $s1['name'] . '</td><td class="text-center font-weight-bold">' . $s1['cnt_good_seeds_planted'] . '</td></tr>';
        }
        echo $htmlData;
    ?>
    </table>

</div>
