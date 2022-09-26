<?php

/* @var $this yii\web\View */
/* @var $virtue array */
/* @var $seedsData array */
/* @var $numSeeds int */
/* @var $numGoodSeeds int */

use yii\helpers\Html;

$this->title = 'Good seeds planted: ' . $numGoodSeeds;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-good-seeds">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>All seeds planted: <strong><?= $numSeeds ?></strong>.</p>
    <p>Total number of <strong>good seeds</strong> planted: <strong><?= $numGoodSeeds ?></strong>.</p>

    <table class="table-responsive">
        <tr><th>ID #</th><th>Virtue Name</th><th>Count Good Seeds Planted</th></tr>
    <?php
        $htmlData = '';
        foreach ($virtue as $v1 => $vName) {
            $cntSeedsPlanted = 0;
            foreach ($seedsData as $s1) {
                if (isset($s1['virtue_id']) && ($s1['virtue_id'] == $v1)) {
                    $cntSeedsPlanted = $s1['cnt_good_seeds_planted'];
                    break;
                }
            }
            $htmlData .= '<tr><td class="text-center">' . $v1 . '</td><td>' . $vName . '</td><td class="text-center font-weight-bold">' . $cntSeedsPlanted . '</td></tr>';
        }
        echo $htmlData;
    ?>
    </table>

</div>
