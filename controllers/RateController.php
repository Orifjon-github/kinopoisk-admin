<?php

namespace app\controllers;

use app\models\Rate;
use app\models\search\RateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RateController implements the CRUD actions for Rate model.
 */
class RateController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Creates a new Rate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionIndex($client = 'mts')
    {
        $client = $client == 'solid' ? 'solid' : 'mts';
        $rates = Rate::find()->where(['client' => $client])->orderBy(['id' => SORT_DESC])->limit(5)->all();
        $model = new Rate();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->currency = 643;
                $model->client = $client;
                $model->save();
                return $this->redirect(['index', 'client' => $client]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
            'rates' => $rates
        ]);
    }
}
