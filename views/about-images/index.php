<?php

use app\models\AboutImages;
use app\models\Socials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AboutImagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'About Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-images-index">

    <p>
        <?= Html::a('Create About Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function (AboutImages $model) {
                    return Html::a('Просмотр Файл', ['/'.$model->image], ['target' => '_blank']);
                }
            ],
            [
                'attribute' => 'enable',
                'value' => function (AboutImages $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AboutImages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
