<?php

use app\models\ProductImages;
use app\models\Socials;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ProductImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-images-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Добавить новое', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'product_id',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function (ProductImages $model) {
                            return Html::a('Просмотр Файл', ['/' . $model->image], ['target' => '_blank']);
                        }
                    ],
                    [
                        'attribute' => 'enable',
                        'value' => function (ProductImages $model) {
                            return Socials::enableOrDisable($model->enable);
                        },
                        'filter' => Socials::enableDisableTypes()
                    ],
//            'created_at',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, ProductImages $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
