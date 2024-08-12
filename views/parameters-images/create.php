<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ParametersImages $model */

$this->title = 'Create Parameters Images';
$this->params['breadcrumbs'][] = ['label' => 'Parameters Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parameters-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
