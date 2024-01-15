<?php

use app\models\Comments;
use app\models\ProductImages;
use app\models\Products;
use app\models\Socials;
use app\services\HelperService;
use yii\grid\ActionColumn;
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
                    HelperService::image(),
                    'short_description',
                    'short_description_uz',
                    'totalCount',
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function (Products $model) {
                            return $model->description;
                        }
                    ],
                    [
                        'attribute' => 'description_uz',
                        'format' => 'raw',
                        'value' => function (Products $model) {
                            return $model->description_uz ?? "";
                        }
                    ],

                    HelperService::enable(),
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
                    HelperService::enable(),
                    HelperService::actionChild('product-compositions')
                ],
            ]); ?>
        </div>
    </div>
</div>
<div class="product-images-index">
    <div class="card">
        <div class="card-body">
            <h3>Изображений Продукт</h3>
            <p><?= Html::a('Добавить новое', ['product-images/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProviderImages,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    HelperService::image(),
                    HelperService::enable(),
                    HelperService::actionChild('product-images')
                ],
            ]); ?>
        </div>
    </div>
</div>
<div class="comments-index">
    <div class="card">
        <div class="card-body">
            <h3>Комментарии к продукту</h3>
            <p><?= Html::a('Добавить новое', ['comments/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProviderComments,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'author',
                    'phone',
                    'description:ntext',
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
                    HelperService::enable(),
                    HelperService::actionChild('comments')
                ],
            ]); ?>
        </div>
    </div>
</div>