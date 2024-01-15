<?php

use app\models\ProductCompositions;
use app\services\HelperService;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ProductCompositionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Compositions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-compositions-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Добавить новое', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'product_id',
                    'name',
                    'name_uz',
                    HelperService::enable(),
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>
</div>
