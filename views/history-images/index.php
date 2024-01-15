<?php

use app\services\HelperService;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'History Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-images-index">

    <p>
        <?= Html::a('Добавить новое', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'history_id',
            HelperService::image(),
            HelperService::enable(),
            HelperService::action()
        ],
    ]); ?>


</div>
