<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p>
            <a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a>
        </p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <h2>Parameters</h2>
                CRUD таблицы parameters.
                <p>
                    <a class="btn btn-outline-secondary" href="<?= Url::base(true) . '/parameters' ?>">Parameters</a>
                </p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Parameters images</h2>
                CRUD таблицы parameters_images, которая хранит связь между параметрами и загруженными изображениями.
                <p>
                    <a class="btn btn-outline-secondary" href="<?= Url::base(true) . '/parameters-images' ?>">Parameters
                        Images
                    </a>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>API</h2>
                Endpoint API ля получения списка параметров, способных хранить icon или icon_gray, вместе с ссылками на
                сами icon.
                <p>
                    <a class="btn btn-outline-secondary" href="<?= Url::base(true) . '/api/get-data' ?>">API</a>
                </p>
            </div>
        </div>
    </div>
</div>
