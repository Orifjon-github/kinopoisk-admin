<?php

namespace app\controllers;

use app\models\Rate;
use app\services\AbsService;
use yii\web\Controller;

/**
 * RateController implements the CRUD actions for Rate model.
 */
class RateController extends Controller
{
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
        $client = in_array($client, ['solid', 'sber']) ? $client : 'mts';
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
