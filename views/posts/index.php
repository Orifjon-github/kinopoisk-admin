<?php

use app\models\Posts;
use app\models\Socials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'title_uz',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function (Posts $model) {
                    return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                }
            ],
//            'description:ntext',
            //'description_uz:ntext',
            [
                'attribute' => 'enable',
                'value' => function (Posts $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Posts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
