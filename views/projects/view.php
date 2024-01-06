<?php

use app\models\Socials;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Projects $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="projects-view">
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
                    'title',
                    'title_uz',
                    'title_en',
                    'image:ntext',
                    'short_description:ntext',
                    'short_description_uz:ntext',
                    'short_description_en:ntext',
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
<div class="project-images-index">
    <div class="card">
        <div class="card-body">
            <h3>Изображений Проект</h3>
            <p><?= Html::a('Добавить новое', ['project-images/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProviderImages,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (\app\models\ProjectImages $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->image], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (\app\models\ProjectImages $model) {
                            return Socials::enableOrDisable($model->enable);
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {delete} {enable}', // specify the actions you want to display
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-eye"></span>', ['project-images/view', 'id' => $model->id]);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-pencil-alt"></span>', ['project-images/update', 'id' => $model->id]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<span class="fas fa-trash"></span>', ['project-images/delete', 'id' => $model->id], [
                                    'data-method' => 'post',
                                    'data-confirm' => 'Are you sure you want to delete this item?',
                                ]);
                            },
                            'enable' => function ($url, $model) {
                                return Html::a('<span class="fas fa-sync" style="color: green; margin-left: 2px;"></span>', ['project-images/enable', 'id' => $model->id]);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>