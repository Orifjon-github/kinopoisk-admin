<?php

namespace app\controllers;

use app\models\Categories;
use app\models\CategoriesSearch;
use app\services\FileService;
use app\services\HelperService;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;

class CategoriesController extends Controller
{
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex(): string
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView(string $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Categories();

        $fileService = new FileService($model);
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $fileService->create('photo');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate(string $id)
    {
        $model = $this->findModel($id);

        $fileService = new FileService($model);
        $oldValue = $model->photo;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $fileService->update('photo', $oldValue);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = $this->findModel($id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }

    protected function findModel($id)
    {
        if (($model = Categories::findOne(['id' => $id])) !== null) {
            return $model;
        }
        Yii::$app->session->setFlash('error', 'Fast contact with Admin!');
        return $this->redirect(['index']);
    }
}
