<?php

use app\models\Services;
use app\models\Socials;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title:ntext',
                    'title_uz:ntext',
                    'title_en:ntext',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (Services $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->image], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function (Services $model) {
                            return $model->description;
                        }
                    ],
                    [
                        'attribute' => 'description_uz',
                        'format' => 'raw',
                        'value' => function (Services $model) {
                            return $model->description_uz;
                        }
                    ],
                    [
                        'attribute' => 'description_en',
                        'format' => 'raw',
                        'value' => function (Services $model) {
                            return $model->description_en;
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (Services $model) {
                            return Socials::enableOrDisable($model->enable);
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>

<div class="service-images-index">
    <div class="card">
        <div class="card-body">
            <h3>Изображений Услуга</h3>
            <p><?= Html::a('Добавить новое', ['service-images/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProviderImages,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (\app\models\ServiceImages $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->image], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (\app\models\ServiceImages $model) {
                            return Socials::enableOrDisable($model->enable);
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {delete} {enable}', // specify the actions you want to display
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-eye"></span>', ['service-images/view', 'id' => $model->id]);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-pencil-alt"></span>', ['service-images/update', 'id' => $model->id]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-trash"></span>', ['service-images/delete', 'id' => $model->id], [
                                    'data-method' => 'post',
                                    'data-confirm' => 'Are you sure you want to delete this item?',
                                ]);
                            },
                            'enable' => function ($url, $model) {
                                return Html::a('<span class="fas fa-sync" style="color: green; margin-left: 2px;"></span>', ['service-images/enable', 'id' => $model->id]);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
