<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ParametersImages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="parameters-images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primary_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon_type')->textInput() ?>

    <?= $form->field($model, 'parameter_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
