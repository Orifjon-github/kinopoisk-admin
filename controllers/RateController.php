<?php

namespace app\controllers;

use app\models\Rate;
use app\services\AbsService;
use yii\web\Controller;
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
        $cb_rate = 0;
        $abs_service = new AbsService();
        $rate = $abs_service->infoCurrency();
        if (isset($rate[0]) && $rate = $rate[0]){
            $cb_rate = $rate->rate / 100;
        }
        $line_rate = [
            'min' => $cb_rate * 0.9,
            'cb_rate' => $cb_rate,
            'max' => $cb_rate * 1.1
        ];
        $client = $client == 'solid' ? 'solid' : 'mts';
        $rates = Rate::find()->where(['client' => $client])->orderBy(['id' => SORT_DESC])->limit(5)->all();
        $model = new Rate();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->amount >= $line_rate['min'] && $model->amount <= $line_rate['max']){
                    $model->currency = 643;
                    $model->client = $client;
                    $model->save();
                }
                return $this->redirect(['index', 'client' => $client]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
            'rates' => $rates,
            'line_rate' => $line_rate
        ]);
    }
}
