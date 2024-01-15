<?php

namespace app\controllers;

use app\models\Sertificates;
use app\models\SertificatesSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * SertificatesController implements the CRUD actions for Sertificates model.
 */
class SertificatesController extends Controller
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
     * Lists all Sertificates models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SertificatesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sertificates model.
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
     * Creates a new Sertificates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sertificates();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $newValue = UploadedFile::getInstance($model, 'image');
                $newValueUz = UploadedFile::getInstance($model, 'image_uz');
                $newValueEn = UploadedFile::getInstance($model, 'image_en');
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;
                if ($newValue->saveAs($filePath)) {
                    $model->image = $filePath;
                }
                if ($newValueUz) {
                    $fileName = uniqid() . '.' . $newValueUz->extension;
                    $filePath = $uploadPath . $fileName;

                    if ($newValueUz->saveAs($filePath)) {
                        $model->image_uz = $filePath;
                    }
                }
                if ($newValueEn) {
                    $fileName = uniqid() . '.' . $newValueEn->extension;
                    $filePath = $uploadPath . $fileName;

                    if ($newValueEn->saveAs($filePath)) {
                        $model->image_en = $filePath;
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
     * Updates an existing Sertificates model.
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
        $oldValueEn = $model->image_en;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $newValue = UploadedFile::getInstance($model, 'image');
            $newValueUz = UploadedFile::getInstance($model, 'image_uz');
            $newValueEn = UploadedFile::getInstance($model, 'image_en');
            $uploadPath = 'uploads/';
            if ($newValue) {
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValue->saveAs($filePath)) {
                    $model->image = $filePath;
                }
            } else {
                $model->image = $oldValue;
            }
            if ($newValueUz) {
                $fileName = uniqid() . '.' . $newValueUz->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValueUz->saveAs($filePath)) {
                    $model->image_uz = $filePath;
                }
            } else {
                $model->image_uz = $oldValueUz;
            }
            if ($newValueEn) {
                $fileName = uniqid() . '.' . $newValueEn->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValueUz->saveAs($filePath)) {
                    $model->image_en = $filePath;
                }
            } else {
                $model->image_en = $oldValueEn;
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

    public function actionEnable($id): Response
    {
        $model = $this->findModel($id);
        $model->enable = $model->enable ? '0' : '1';
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Успешно сохранено');
            return $this->redirect('index');
        }
        Yii::$app->session->setFlash('error', 'Временная ошибка');
        return $this->redirect('index');
    }

    /**
     * Finds the Sertificates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Sertificates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sertificates::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
