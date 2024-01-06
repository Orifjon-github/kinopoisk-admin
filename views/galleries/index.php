<?php

use app\models\Galleries;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\GalleriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Галереи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Create Galleries', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'image:ntext',
                    'enable',
                    'created_at',
                    'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Galleries $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
