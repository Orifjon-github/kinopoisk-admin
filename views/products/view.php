<?php

use app\models\ProductImages;
use app\models\Products;
use app\models\Socials;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">
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
                    'name',
                    'name_uz',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (Products $model) {
                            return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                        }
                    ],
                    'totalCount',
                    'description:ntext',
                    'description_uz:ntext',
                    [
                        'attribute' => 'enable',
                        'value' => function (Products $model) {
                            return Socials::enableOrDisable($model->enable);
                        }
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
<div class="product-compositions-index">
    <div class="card">
        <div class="card-body">
            <h3>Состави Продукт</h3>
            <p>
                <?= Html::a('Добавить новое', ['product-compositions/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    [
                        'attribute' => 'enable',
                        'value' => function ($model) {
                            return Socials::enableOrDisable($model->enable);
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => Yii::t('app', '#'),
                        'urlCreator' => function ($action, $loanModel, $key, $index) {
                            if ($action === 'view') {
                                return Url::to(['product-compositions/view', 'id' => $loanModel->id]);
                            }
                            if ($action === 'update') {
                                return Url::to(['product-compositions/update', 'id' => $loanModel->id]);
                            }
                            if ($action === 'delete') {
                                return Url::to(['product-compositions/delete', 'id' => $loanModel->id]);
                            }
                            return null;
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
<div class="product-images-index">
    <div class="card">
        <div class="card-body">
            <h3>Изображений Продукт</h3>
            <p>
                <?= Html::a('Добавить новое', ['product-images/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProviderImages,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (ProductImages $model) {
                            return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (ProductImages $model) {
                            return Socials::enableOrDisable($model->enable);
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => Yii::t('app', '#'),
                        'urlCreator' => function ($action, $loanModel, $key, $index) {
                            if ($action === 'view') {
                                return Url::to(['product-images/view', 'id' => $loanModel->id]);
                            }
                            if ($action === 'update') {
                                return Url::to(['product-images/update', 'id' => $loanModel->id]);
                            }
                            if ($action === 'delete') {
                                return Url::to(['product-images/delete', 'id' => $loanModel->id]);
                            }
                            return null;
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>