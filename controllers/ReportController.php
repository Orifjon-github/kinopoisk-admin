<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ReportController extends Controller
{
    public function actionIndex($client = 'mts')
    {

        $connection = Yii::$app->db2;
        $command = $connection->createCommand("
    SELECT DATE(created_at) as date, COUNT(nominal) as count, SUM(nominal) / 100 as sum, AVG(nominal) / 100 as average
    FROM transfer t
    WHERE t.client = :client
      and t.status = 'success'
    GROUP BY DATE(t.created_at);", [':client' => $client]);

        $report = $command->queryAll();
        return $this->render('index', [
            'report' => $report
        ]);
    }
}
