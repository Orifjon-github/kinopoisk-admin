<?php

use app\models\Categories;
use app\services\HelperService;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\CategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    [
                        'attribute' => 'parent_id',
                        'value' => function (Categories $model) {
                            if ($model->parent) {
                                return $model->parent->name;
                            }
                            return "Main Category";
                        }
                    ],
                    HelperService::image('photo'),
                    HelperService::enable(),
                    'created_at',
                    HelperService::action()
                ],
            ]); ?>
        </div>
    </div>
</div>
