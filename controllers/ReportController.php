<?php

namespace app\controllers;

use app\models\DateForm;
use Yii;
use yii\web\Controller;

class ReportController extends Controller
{
    public function actionIndex($client = 'mts')
    {
        $model = new DateForm();
        $connection = Yii::$app->db2;
        if ($this->request->post() and $this->request->bodyParams['DateForm']['date']) {
            $date = date('Y-m-d', strtotime(Yii::$app->request->bodyParams['DateForm']['date']));
            $command = $connection->createCommand(
                "SELECT DATE(created_at) as date, COUNT(nominal) as count, SUM(nominal) / 100 as sum, AVG(nominal) / 100 as average
                FROM transfer t
                WHERE t.client = :client
                and t.status = 'success'
                and DATE(t.created_at) = :day
                GROUP BY DATE(t.created_at);", [':client' => $client, ':day' => $date]);
        } else {
            $command = $connection->createCommand(
                "SELECT DATE(created_at) as date, COUNT(nominal) as count, SUM(nominal) / 100 as sum, AVG(nominal) / 100 as average
                FROM transfer t
                WHERE t.client = :client
                and t.status = 'success'
                GROUP BY DATE(t.created_at) DESC LIMIT 5;", [':client' => $client]);
        }
        $report = $command->queryAll();
        return $this->render('index', [
            'report' => $report,
            'model' => $model
        ]);
    }
}
