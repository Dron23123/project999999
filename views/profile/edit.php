<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 09.04.2019
 * Time: 11:21 PM
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;


$form = ActiveForm::begin(['options' => ['id' => 'form-edit','enctype'=>'multipart/form-data']]); ?>

<?= $form->field($model, 'image')->fileInput(['options' => ['accept' => 'image/*' ] ,])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>