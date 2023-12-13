<?php

use app\models\Comments;
use app\models\Socials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CommentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <p>
        <?= Html::a('Create Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author',
            'phone',
            'product_id',
            'description:ntext',
            //'description_uz:ntext',
            [
                'attribute' => 'video',
                'format' => 'raw',
                'value' => function (Comments $model) {
                    if (str_starts_with($model->video, 'uploads/')) {
                        return Html::a('Просмотр Файл', ['/'.$model->video], ['target' => '_blank']);
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
                        return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                    } else {
                        return Html::a('Просмотр Файл', $model->image, ['target' => '_blank']);
                    }
                }
            ],
            [
                'attribute' => 'enable',
                'value' => function (Comments $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Comments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
