<?php

use app\models\ProductCompositions;
use app\models\Products;
use app\models\Socials;
use app\services\HelperService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
    <div class="card">
        <div class="card-body">

            <p><?= Html::a('Добавить новое', ['create'], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'short_description',
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function (Products $model) {
                            return $model->description;
                        }
                    ],
                    HelperService::image(),
                    HelperService::enable(),
                    HelperService::action(),
                ],
            ]); ?>
        </div>
    </div>
</div>

