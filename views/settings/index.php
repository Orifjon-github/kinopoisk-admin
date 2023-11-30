<?php

use app\models\Settings;
use app\models\Socials;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SettingsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-index">

    <p>
        <?= Html::a('Create Settings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
            'value:ntext',
            'value_uz:ntext',
            [
                'attribute' => 'enable',
                'value' => function (Settings $model) {
                    return Socials::enableOrDisable($model->enable);
                },
                'filter' => Socials::enableDisableTypes()
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Settings $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
