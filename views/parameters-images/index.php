<?php

use app\models\ParametersImages;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ParametersImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Parameters Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parameters-images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Parameters Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'path'      => [
                'attribute' => 'path',
                'value'     => function ($model) {
                    return $model->path;
                },
                'format'    => ['image', ['width' => '150', 'height' => '150']],
            ],
            'primary_name',
            'icon_type' => [
                'attribute' => 'icon_type',
                'value'     => function ($model) {
                    return ParametersImages::$types[$model->icon_type];
                }
            ],
            'parameter_id',
            [
                'class'      => ActionColumn::className(),
                'urlCreator' => function ($action, ParametersImages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
