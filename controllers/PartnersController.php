<?php

namespace app\controllers;

use app\models\Partners;
use app\models\PartnersSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * PartnersController implements the CRUD actions for Partners model.
 */
class PartnersController extends Controller
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
        $searchModel = new PartnersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Partners();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $newValue = UploadedFile::getInstance($model, 'icon');
                $newValueUz = UploadedFile::getInstance($model, 'icon_uz');
                $newValueEn = UploadedFile::getInstance($model, 'icon_en');
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $fileNameUz = uniqid() . '.' . $newValueUz->extension;
                $fileNameEn = uniqid() . '.' . $newValueEn->extension;
                $filePath = $uploadPath . $fileName;
                $filePathUz = $uploadPath . $fileNameUz;
                $filePathEn = $uploadPath . $fileNameEn;
                if ($newValue->saveAs($filePath)) {
                    $model->icon = $filePath;
                }
                if ($newValueUz) {
                    if ($newValueUz->saveAs($filePathUz)) {
                        $model->icon_uz = $filePathUz;
                    }
                }
                if ($newValueEn) {
                    if ($newValueUz->saveAs($filePathEn)) {
                        $model->icon_en = $filePathEn;
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
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldValue = $model->icon;
        $oldValueUz = $model->icon_uz;
        $oldValueEn = $model->icon_en;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $newValue = UploadedFile::getInstance($model, 'icon');
            $newValueUz = UploadedFile::getInstance($model, 'icon_uz');
            $newValueEn = UploadedFile::getInstance($model, 'icon_en');
            if ($newValue) {
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValue->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValue->saveAs($filePath)) {
                    $model->icon = $filePath;
                }
            } else {
                $model->icon = $oldValue;
            }
            if ($newValueUz) {
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValueUz->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValueUz->saveAs($filePath)) {
                    $model->icon_uz = $filePath;
                }
            } else {
                $model->icon_uz = $oldValueUz;
            }
            if ($newValueEn) {
                $uploadPath = 'uploads/';
                $fileName = uniqid() . '.' . $newValueEn->extension;
                $filePath = $uploadPath . $fileName;

                if ($newValueEn->saveAs($filePath)) {
                    $model->icon_en = $filePath;
                }
            } else {
                $model->icon_en = $oldValueEn;
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
     * @throws \yii\db\StaleObjectException
     * @throws \Throwable
     * @throws NotFoundHttpException
     */
    public function actionDelete($id): Response
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
     * @throws NotFoundHttpException
     */
    protected function findModel($id): ?Partners
    {
        if (($model = Partners::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
