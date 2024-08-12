<?php

namespace app\controllers;

use app\models\Parameters;
use Yii;
use yii\helpers\Url;
use yii\web\Response;
use yii\web\Controller;

class ApiController extends Controller
{
    public function actionGetData()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $result = [];
        $baseUrl = Url::base(true);
        $parameters = Parameters::find()
            ->with(['parameterIcon', 'parameterIconGray'])
            ->where('type = :type', [':type' => Parameters::TYPE_TWO])
            ->all();

        foreach ($parameters as $parameter) {
            $urlIcon = $parameter->parameterIcon ? "{$baseUrl}/{$parameter->parameterIcon->path}" : '';
            $urlIconGray = $parameter->parameterIconGray ? "{$baseUrl}/{$parameter->parameterIconGray->path}" : '';

            $result[] = [
                'id'     => $parameter->id,
                'images' => [
                    'icon'     => [
                        'url'  => $urlIcon,
                    ],
                    'icon_gray' => [
                        'url'  => $urlIconGray,
                    ],
                ]
            ];
        }

        return $result;
    }
}