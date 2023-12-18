<?php

namespace app\controllers;

use app\models\Comments;
use app\models\CommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CommentsController implements the CRUD actions for Comments model.
 */
class CommentsController extends Controller
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
     * Lists all Comments models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CommentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comments model.
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
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new Comments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $newValue = UploadedFile::getInstance($model, 'image');
                $newValueUz = UploadedFile::getInstance($model, 'video');
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
                        $model->video = $filePath;
                    }
                }
                $model->product_id = $id;
                if ($model->save()) {
                    return $this->redirect(['products/view', 'id' => $id]);
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
     * Updates an existing Comments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldValue = $model->image;
        $oldValueUz = $model->video;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $newValue = UploadedFile::getInstance($model, 'image');
            $newValueUz = UploadedFile::getInstance($model, 'video');
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
                    $model->video = $filePath;
                }
            } else {
                $model->video = $oldValueUz;
            }
            if ($model->save()) {
                return $this->redirect(['products/view', 'id' => $model->product_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $productID = $model->product_id;
        $model->delete();

        return $this->redirect(['products/view', 'id' => $productID]);
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
