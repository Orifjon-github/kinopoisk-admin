<?php

use app\models\Comments;
use app\models\Socials;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Comments $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comments-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                    'author',
                    'phone',
                    'product_id',
                    'description:ntext',
                    'description_uz:ntext',
                    [
                        'attribute' => 'video',
                        'format' => 'raw',
                        'value' => function (Comments $model) {
                            if (str_starts_with($model->video, 'uploads/')) {
                                return Html::a('Просмотр Файл', ['/' . $model->video], ['target' => '_blank']);
                            } else {
                                return Html::a('Просмотр Файл', $model->video, ['target' => '_blank']);
                            }

                        }
                    ],
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (Comments $model) {
                            if (str_starts_with($model->image, 'uploads/')) {
                                return Html::a('Просмотр Файл', ['/' . $model->image], ['target' => '_blank']);
                            } else {
                                return Html::a('Просмотр Файл', $model->image, ['target' => '_blank']);
                            }
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (Comments $model) {
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
