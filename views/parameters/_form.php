<?php

use app\assets\ParametersAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Parameters $model */
/** @var yii\widgets\ActiveForm $form */
/* @var $formParams */

ParametersAsset::register($this);

?>

<div class="parameters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->dropDownList($formParams['typesList'], [
        'id' => 'select-type',
    ]) ?>
    <?= $form->field($model, 'icon')->fileInput([
        'accept' => 'image/*',
    ]); ?>
    <?= $form->field($model, 'iconGray')->fileInput([
        'accept' => 'image/*',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
