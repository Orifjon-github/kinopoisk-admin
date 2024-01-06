<?php

use app\models\Projects;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProjectsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Projects', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    'title_uz',
                    'title_en',
                    'image:ntext',
                    //'short_description:ntext',
                    //'short_description_uz:ntext',
                    //'short_description_en:ntext',
                    //'description:ntext',
                    //'description_uz:ntext',
                    //'description_en:ntext',
                    //'enable',
                    //'created_at',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Projects $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>
