<?php

use app\models\Stores;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\StoresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stores-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Stores', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'user_id',
                    'name',
                    'description:ntext',
                    'image',
                    'status',
                    //'address:ntext',
                    //'banner_1:ntext',
                    //'banner_2:ntext',
                    //'banner_3:ntext',
                    //'created_at',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Stores $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
