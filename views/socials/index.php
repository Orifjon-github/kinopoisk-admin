<?php

use app\models\Socials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SocialsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socials-index">

    <p>
        <?= Html::a('Create new', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'link:ntext',
            [
                'attribute' => 'enable',
                'value' => function (Socials $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Socials $model, $key, $index, $column) {

                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
