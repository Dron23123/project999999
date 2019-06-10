<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'start_date')->widget(
        \yii\widgets\MaskedInput::className(), [
            'mask' => "y-2-1",
            'clientOptions' => [
                'alias' => 'date',
                "placeholder" => "yyyy-mm-dd",
                "separator" => "-"
            ]
        ]
    ); ?>
    <?= $form->field($model, 'estimate_date')->widget(
        \yii\widgets\MaskedInput::className(), [
            'mask' => "y-2-1",
            'clientOptions' => [
                'alias' => 'date',
                "placeholder" => "yyyy-mm-dd",
                "separator" => "-"
            ]
        ]
    ); ?>
    <?= $form->field($model, 'used_time')->textInput() ?>
    <?= $form->field($model, 'status_id')->dropDownList([
        '1' => 'To do',
    ]);?>
    <?= $form->field($model, 'priority_id')->dropDownList([
    '1' => 'Minor',
    '2' => 'Tweak',
]);?>
    <?= $form->field($model, 'sprint_id')->textInput((['readonly' => true, 'value' => $id]))?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
