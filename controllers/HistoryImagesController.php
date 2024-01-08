<?php

namespace app\controllers;

use app\models\HistoryImages;
use app\models\HistoryImagesSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * HistoryImagesController implements the CRUD actions for HistoryImages model.
 */
class HistoryImagesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
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

    /**
     * Lists all HistoryImages models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HistoryImagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HistoryImages model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HistoryImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new HistoryImages();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $newValue = UploadedFile::getInstance($model, 'image');
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;
                if ($newValue->saveAs($filePath)) {
                    $model->image = $filePath;
                }
                $model->history_id = $id;
                if ($model->save()) {
                    return $this->redirect(['histories/view', 'id' => $model->history_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HistoryImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldValue = $model->image;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $newValue = UploadedFile::getInstance($model, 'image');
            if ($newValue) {
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValue->saveAs($filePath)) {
                    $model->image = $filePath;
                }
            } else {
                $model->image = $oldValue;
            }
            if ($model->save()) {
                return $this->redirect(['histories/view', 'id' => $model->history_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HistoryImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $productID = $model->history_id;
        $model->delete();

        return $this->redirect(['histories/view', 'id' => $productID]);
    }

    public function actionEnable($id): Response
    {
        $model = $this->findModel($id);
        $model->enable = $model->enable ? '0' : '1';
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Успешно сохранено');
            return $this->redirect(['histories/view', 'id' => $model->history_id]);
        }
        Yii::$app->session->setFlash('error', 'Временная ошибка');
        return $this->redirect(['histories/view', 'id' => $model->history_id]);
    }

    /**
     * Finds the HistoryImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return HistoryImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HistoryImages::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
