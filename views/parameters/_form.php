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
<style>
    img {
        max-width: 100%;
        max-height: 500px;
        height: auto;
        width: auto;
        object-fit: contain;
    }
</style>
<div class="parameters-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->dropDownList($formParams['typesList'], [
        'id' => 'select-type',
    ]) ?>
    <div class="file-input-form d-none">
        <?= $form->field($model, 'icon')->fileInput([
            'accept' => 'image/*',
        ]); ?>
        <img
                class="img-thumbnail <?= $formParams['iconSrc'] ? '' : 'd-none' ?>"
                id="preview-icon"
                src="<?= $formParams['iconSrc'] ?>"
                alt="Предпросмотр изображения"
        />
        <?= $form->field($model, 'iconGray')->fileInput([
            'accept' => 'image/*',
        ]); ?>
        <img
                class="img-thumbnail <?= $formParams['iconGraySrc'] ? '' : 'd-none' ?>"
                id="preview-icon-gray"
                src="<?= $formParams['iconGraySrc'] ?>"
                alt="Предпросмотр изображения"
        />
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
