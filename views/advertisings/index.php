<?php

use app\models\Advertisings;
use app\models\Socials;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AdvertisingsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Реклама';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisings-index">
    <div class="card">
        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    'description:ntext',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (Advertisings $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->image], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'format' => 'raw',
                        'value' => function (Advertisings $model) {
                            $icon = $model->enable
                                ? Html::a('<span class="fas fa-toggle-on fa-2x" style="color: green"></span>', ['enable', 'id' => $model->id])
                                : Html::a('<span class="fas fa-toggle-off fa-2x" style="color: red"></span>', ['enable', 'id' => $model->id]);

                            return '<div class="text-center">' . $icon . '</div>';
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update}',
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>
