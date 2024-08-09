<?php

namespace app\controllers;

use app\models\Parameters;
use app\models\ParametersSearch;
use app\helpers\DumpHelper;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ParametersController implements the CRUD actions for Parameters model.
 */
class ParametersController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Parameters models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new ParametersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parameters model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Parameters model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     * @throws Exception
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $model = new Parameters();
        $post = $this->request->post();
        $formParams['typesList'] = Parameters::$typesList;

        if ($this->request->isPost) {
            if ($model->load($post) && $model->save()) {
                $model->icon = UploadedFile::getInstance($model, 'icon');
                $model->iconGray = UploadedFile::getInstance($model, 'iconGray');

                $model->saveImage();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model'      => $model,
            'formParams' => $formParams,
        ]);
    }

    /**
     * Updates an existing Parameters model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $post = $this->request->post();
        $model = $this->findModel($id);
        $formParams['typesList'] = Parameters::$typesList;

        if ($this->request->isPost && $model->load($post) && $model->save()) {
//            $icon = $post['parameter-icon'] ?? null;

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model'      => $model,
            'formParams' => $formParams,
        ]);
    }

    /**
     * Deletes an existing Parameters model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Parameters model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Parameters the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Parameters::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

//    /**
//     * @throws InvalidConfigException
//     */
//    protected function saveImage(Parameters $model, array $post): void
//    {
//        $icon = $post[$model->formName()]['icon'];
//    }
}
