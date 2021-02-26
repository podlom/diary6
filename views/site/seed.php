<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Seed */
/* @var $form ActiveForm */
/* @var $virtue array */
/* @var $time string */
/* @var $date string */
/* @var $userId int */

?>
<div class="site-seed">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'virtue_id')->dropDownList($virtue, ['prompt' => '--- Choose virtue ---']) ?>
        <?= $form->field($model, 'seed_time')->textInput(['value' => $time]) ?>
        <?= $form->field($model, 'seed_date')->textInput(['value' => $date])  ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value' => $userId])->label(false) ?>
        <?= $form->field($model, 'description')->textarea([]) ?>
        <?= $form->field($model, 'added_at')->hiddenInput(['value' => $date . ' ' . $time])->label(false) ?>
        <?= $form->field($model, 'is_positive')->checkbox([]) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-seed -->
