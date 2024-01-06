<?php

use app\models\Socials;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Histories $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Истории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="histories-view">
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
                    'years',
                    'title:ntext',
                    'title_uz:ntext',
                    'title_en:ntext',
                    'description:ntext',
                    'description_uz:ntext',
                    'description_en:ntext',
                    'enable',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
<div class="history-images-index">
    <div class="card">
        <div class="card-body">
            <h3>Изображений История</h3>
            <p><?= Html::a('Добавить новое', ['history-images/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProviderImages,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (\app\models\HistoryImages $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->image], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (\app\models\HistoryImages $model) {
                            return Socials::enableOrDisable($model->enable);
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {delete} {enable}', // specify the actions you want to display
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-eye"></span>', ['history-images/view', 'id' => $model->id]);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-pencil-alt"></span>', ['history-images/update', 'id' => $model->id]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-trash"></span>', ['history-images/delete', 'id' => $model->id], [
                                    'data-method' => 'post',
                                    'data-confirm' => 'Are you sure you want to delete this item?',
                                ]);
                            },
                            'enable' => function ($url, $model) {
                                return Html::a('<span class="fas fa-sync" style="color: green; margin-left: 2px;"></span>', ['history-images/enable', 'id' => $model->id]);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>