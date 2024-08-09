<?php

namespace app\assets;

class ParametersAsset extends AppAsset
{
    public $js = [
        'js/parameters/parameters-image-import.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}