<?php

use app\models\Galleries;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\GalleriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Галереи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Galleries', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'image:ntext',
                    'enable',
                    'created_at',
                    'updated_at',
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {delete} {enable}', // specify the actions you want to display
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-eye"></span>', $url); // FontAwesome view icon
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-pencil-alt"></span>', $url); // FontAwesome update icon
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-trash"></span>', $url, [
                                    'data-method' => 'post',
                                    'data-confirm' => 'Are you sure you want to delete this item?',
                                ]); // FontAwesome delete icon
                            },
                            'enable' => function ($url, Galleries $model) {
                                return Html::a('<span class="fas fa-sync" style="color: green; margin-left: 2px;"></span>', ['enable', 'id' => $model->id]);
                            }
                        ],
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>
