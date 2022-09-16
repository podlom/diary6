<?php

/* @var $this yii\web\View */
/* @var $virtue array */
/* @var $seedsData array */
/* @var $numSeeds int */
/* @var $numGoodSeeds int */

use yii\helpers\Html;

$this->title = 'Good seeds planted: ' . $numGoodSeeds;
// $this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-good-seeds">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>All seeds planted: <strong><?= $numSeeds ?></strong>.</p>
    <p>Total number of <strong>good seeds</strong> planted: <strong><?= $numGoodSeeds ?></strong>.</p>

    <table class="table-responsive">
        <tr><th>ID #</th><th>Virtue Name</th><th>Count Good Seeds Planted</th></tr>
    <?php
        $htmlData = '';
        foreach ($virtue as $vId => $vName) {
            $s1 = $seedsData[$vId];
            if (isset($seedsData[$vId])) {
                $htmlData .= '<tr><td class="text-center">' . $vId . '</td><td>' . $vName . '</td><td class="text-center font-weight-bold">' . $s1['cnt_good_seeds_planted'] . '</td></tr>';
            } else {
                $htmlData .= '<tr><td class="text-center">' . $vId . '</td><td>' . $vName . '</td><td class="text-center font-weight-bold">0</td></tr>';
            }
        }
        /* foreach ($seedsData as $s1) {
            $htmlData .= '<tr><td class="text-center">' . $s1['virtue_id'] . '</td><td>' . $s1['name'] . '</td><td class="text-center font-weight-bold">' . $s1['cnt_good_seeds_planted'] . '</td></tr>';
        } */
        echo $htmlData;
    ?>
    </table>

</div>
