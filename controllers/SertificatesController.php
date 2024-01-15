<?php

namespace app\controllers;

use app\models\Sertificates;
use app\models\SertificatesSearch;
use app\services\FileService;
use app\services\HelperService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SertificatesController extends Controller
{

    public function actionIndex(): string
    {
        $searchModel = new SertificatesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Sertificates();
        $fileService = new FileService($model);
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $fileService->create();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fileService = new FileService($model);
        $oldValue = $model->image;
        $oldValueUz = $model->image_uz;
        $oldValueEn = $model->image_en;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $fileService->update($oldValue, $oldValueUz, $oldValueEn);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sertificates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionEnable($id): Response
    {
        $model = $this->findModel($id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel($id): ?Sertificates
    {
        if (($model = Sertificates::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
