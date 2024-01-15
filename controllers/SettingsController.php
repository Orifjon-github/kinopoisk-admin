<?php

namespace app\controllers;

use app\models\Settings;
use app\models\SettingsSearch;
use app\services\HelperService;
use yii\helpers\Url;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * SettingsController implements the CRUD actions for Settings model.
 */
class SettingsController extends Controller
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

    public function actionIndex(): string
    {
        $searchModel = new SettingsSearch();
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

    /**
     * Creates a new Settings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
//    public function actionCreate()
//    {
//        $model = new Settings();
//
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    public function actionUpdate($id)

    {
        $model = Settings::findOne($id);
        $oldValue = $model->value;
        $oldValueUz = $model->value_uz;
        $oldValueEn = $model->value_en;
        if ($model->load(Yii::$app->request->post()) ?? $model->validate()) {
            if (in_array($model->key, Settings::fileKeys())) {
                $newValue = UploadedFile::getInstance($model, 'value');
                $newValueUz = UploadedFile::getInstance($model, 'value_uz');
                $newValueEn = UploadedFile::getInstance($model, 'value_uz');
                if ($newValue) {
                    $uploadPath = 'uploads/';
                    $fileName = uniqid() . '.' . $newValue->extension;
                    $filePath = $uploadPath . $fileName;

                    if ($newValue->saveAs($filePath)) {
                        $model->value = $filePath;
                    }
                } else {
                    $model->value = $oldValue;
                }
                if ($newValueUz) {
                    $uploadPath = 'uploads/';
                    $fileName = uniqid() . '.' . $newValueUz->extension;
                    $filePath = $uploadPath . $fileName;

                    if ($newValueUz->saveAs($filePath)) {
                        $model->value_uz = $filePath;
                    }
                } else {
                    $model->value_uz = $oldValueUz;
                }
                if ($newValueEn) {
                    $uploadPath = 'uploads/';
                    $fileName = uniqid() . '.' . $newValueEn->extension;
                    $filePath = $uploadPath . $fileName;

                    if ($newValueEn->saveAs($filePath)) {
                        $model->value_en = $filePath;
                    }
                } else {
                    $model->value_en = $oldValueEn;
                }

            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', ['model' => $model]);
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
    protected function findModel($id): ?Settings
    {
        if (($model = Settings::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
