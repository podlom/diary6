<?php

/* @var $this yii\web\View */
/* @var $model app\models\Seed */
/* @var $form ActiveForm */
/* @var $virtue array */
/* @var $time string */
/* @var $date string */
/* @var $userId int */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;


?>
<div class="site-seed">

    <?php $form = ActiveForm::begin(); ?>

        <div class="text-center">
            The seed is ... <strong>Positive</strong> - "ON" or <strong>Negative</strong> - "OFF"
        </div>
        <div>
            <?php echo SwitchInput::widget(['name' => 'is_positive',
                'type' => SwitchInput::CHECKBOX,
                'pluginOptions' => [
                    'onText' => 'Positive',
                    'offText' => 'Negative',
                    'onColor' => 'success',
                    'offColor' => 'danger',
                ]
            ]); ?>
        </div>
        <?= $form->field($model, 'virtue_id')->dropDownList($virtue, ['prompt' => '--- Choose virtue ---']) ?>
        <?= $form->field($model, 'seed_time')->textInput(['value' => $time]) ?>
        <?= $form->field($model, 'seed_date')->textInput(['value' => $date])  ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value' => $userId])->label(false) ?>
        <?= $form->field($model, 'description')->textarea([]) ?>
        <?= $form->field($model, 'added_at')->hiddenInput(['value' => $date . ' ' . $time])->label(false) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-seed -->
