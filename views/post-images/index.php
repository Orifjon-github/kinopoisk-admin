<?php

use app\models\PostImages;
use app\models\Socials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PostImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Post Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-images-index">

    <p>
        <?= Html::a('Create Post Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'post_id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function (PostImages $model) {
                    return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                }
            ],
            [
                'attribute' => 'enable',
                'value' => function (PostImages $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
//            'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PostImages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
