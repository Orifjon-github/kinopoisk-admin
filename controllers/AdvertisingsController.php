<?php

namespace app\controllers;

use app\models\Advertisings;
use app\models\AdvertisingsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * AdvertisingsController implements the CRUD actions for Advertisings model.
 */
class AdvertisingsController extends Controller
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
     * Lists all Advertisings models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdvertisingsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advertisings model.
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
     * Creates a new Advertisings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Advertisings();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $newValue = UploadedFile::getInstance($model, 'image');
                $newValueUz = UploadedFile::getInstance($model, 'image_uz');
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;
                if ($newValue->saveAs($filePath)) {
                    $model->image = $filePath;
                }
                if ($newValueUz) {
                    $uploadPath = 'uploads/';
                    $fileName = uniqid() . '.' . $newValueUz->extension;
                    $filePath = $uploadPath . $fileName;

                    if ($newValueUz->saveAs($filePath)) {
                        $model->image_uz = $filePath;
                    }
                }
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing Advertisings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldValue = $model->image;
        $oldValueUz = $model->image_uz;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $newValue = UploadedFile::getInstance($model, 'image');
            $newValueUz = UploadedFile::getInstance($model, 'image_uz');
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
            if ($newValueUz) {
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValueUz->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValueUz->saveAs($filePath)) {
                    $model->image_uz = $filePath;
                }
            } else {
                $model->image_uz = $oldValueUz;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Advertisings model.
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

    public function actionEnable($id): Response
    {
        $model = $this->findModel($id);
        if ($model->enable){
            $model->enable = '0';
        } else {
            $model->enable = '1';
        }
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Успешно сохранено');
            return $this->redirect('index');
        }
        Yii::$app->session->setFlash('error', $model->firstErrors);
        return $this->redirect('index');
    }
    /**
     * Finds the Advertisings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Advertisings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advertisings::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
