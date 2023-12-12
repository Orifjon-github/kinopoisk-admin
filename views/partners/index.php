<?php

use app\models\Partners;
use app\models\Socials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PartnersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <p>
        <?= Html::a('Create Partners', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            'name_uz',
            'link:ntext',
//            'link_uz:ntext',
            [
                'attribute' => 'icon',
                'format' => 'raw',
                'value' => function (Partners $model) {
                    return Html::a('Просмотр Файл', ['/'.$model->icon], ['target' => '_blank']);
                }
            ],
            //'icon_uz:ntext',
            [
                'attribute' => 'enable',
                'value' => function (Partners $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Partners $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
