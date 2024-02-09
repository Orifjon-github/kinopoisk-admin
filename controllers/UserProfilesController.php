<?php

namespace app\controllers;

use app\models\UserProfiles;
use app\models\UserProfilesSearch;
use app\services\HelperService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UserProfilesController extends Controller
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
        $searchModel = new UserProfilesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => HelperService::findModel((new UserProfiles()), $id),
        ]);
    }

    public function actionCreate()
    {
        $model = new UserProfiles();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
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
        $model = HelperService::findModel((new UserProfiles()), $id);

        if ($model && $this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['users/view', 'id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id): \yii\web\Response
    {
        $model =  HelperService::findModel((new UserProfiles()), $id);
        $user_id = $model->user_id;

        $model->delete();

        return $this->redirect(['users/view', 'id' => $user_id]);
    }
}
