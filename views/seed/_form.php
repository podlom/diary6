<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;


/* @var $this yii\web\View */
/* @var $model app\models\Seed */
/* @var $form yii\widgets\ActiveForm */
/* @var $virtue array */
/* @var $time string */
/* @var $date string */
/* @var $userId int */

?>

<div class="seed-form">

    <?php $form = ActiveForm::begin(); ?>

    <div>
        The seed is ... <strong>Positive</strong> - "ON" or <strong>Negative</strong> - "OFF"
    </div>
    <div>
        <?php

        $isPositiveDefaultValue = $model->is_positive;
        if (isset($isPositive) && is_bool($isPositive)) {
            $isPositiveDefaultValue = $isPositive;
        }
        $model->is_positive = $isPositiveDefaultValue;
        ?>
        <?= $form->field($model, 'is_positive')->widget(SwitchInput::classname(), [])->label(false) ?>

    </div>

    <?= $form->field($model, 'virtue_id')->dropDownList($virtue, ['prompt' => '--- Choose virtue ---']) ?>

    <?= $form->field($model, 'seed_time')->textInput(['value' => $time]) ?>

    <?= $form->field($model, 'seed_date')->textInput(['value' => $date])  ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $userId])->label(false) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'added_at')->hiddenInput(['value' => $date . ' ' . $time])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
