<?php

namespace app\controllers;

use app\models\Stores;
use app\models\StoresSearch;
use app\services\FileService;
use app\services\HelperService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class StoresController extends Controller
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
        $searchModel = new StoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => HelperService::findModel((new Stores()), $id),
        ]);
    }

    public function actionCreate($id=null)
    {
        $model = new Stores();
        $fileService = new FileService($model);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($id) {
                    $model->user_id = $id;
                }
                $model->save(false);
                $fileService->create('image');
                return $this->redirect(['users/view', 'id' => $model->user_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model =  HelperService::findModel((new Stores()), $id);

        $fileService = new FileService($model);
        $oldValue = $model->image;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $fileService->update('image', $oldValue);
            return $this->redirect(['users/view', 'id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id): \yii\web\Response
    {
        $model =  HelperService::findModel((new Stores()), $id);
        $user_id = $model->user_id;

        $model->delete();

        return $this->redirect(['users/view', 'id' => $user_id]);
    }
}
