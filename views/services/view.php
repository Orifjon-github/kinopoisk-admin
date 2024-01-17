<?php

use app\models\Services;
use app\models\Socials;
use app\services\HelperService;
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
                    HelperService::image(),
                    HelperService::enable(),
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
                    HelperService::image(),
                    HelperService::enable(),
                    HelperService::actionChild('service-images')
                ],
            ]); ?>
        </div>
    </div>
</div>
