<?php

use app\models\Socials;
use app\services\HelperService;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Posts $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">
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
                    'title',
                    'title_uz',
                    'short_description:ntext',
                    'short_description_uz:ntext',
                    'short_description_en:ntext',
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function (\app\models\Posts $model) {
                            return $model->description;
                        }
                    ],
                    [
                        'attribute' => 'description_uz',
                        'format' => 'raw',
                        'value' => function (\app\models\Posts $model) {
                            return $model->description_uz ?? '';
                        }
                    ],
                    [
                        'attribute' => 'description_en',
                        'format' => 'raw',
                        'value' => function (\app\models\Posts $model) {
                            return $model->description_en ?? '';
                        }
                    ],
                    HelperService::image(),
                    HelperService::enable(),
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
<div class="post-images-index">
    <div class="card">
        <div class="card-body">
            <h3>Изображений Новости</h3>
            <p><?= Html::a('Добавить новое', ['post-images/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProviderImages,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    HelperService::image(),
                    HelperService::enable(),
                    HelperService::actionChild('post-images')
                ],
            ]); ?>
        </div>
    </div>
</div>