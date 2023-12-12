<?php

use app\models\Settings;
use app\models\Socials;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\SettingsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-success">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            [
                                'attribute' => 'key',
                                'value' => function (Settings $model) {
                                    return $model::settingKeys($model->key) ?? $model->key;
                                }
                            ],
                            [
                                'attribute' => 'value',
                                'format' => 'raw',
                                'value' => function (Settings $model) {
                                    if (str_starts_with($model->value, 'uploads/')) {
                                        return Html::a('Просмотр Файл', ['/' . $model->value], ['target' => '_blank']);
                                    } else {
                                        return $model->value;
                                    }
                                }
                            ],
                            [
                                'attribute' => 'value_uz',
                                'format' => 'raw',
                                'value' => function (Settings $model) {
                                    if (empty($model->value_uz)) {
                                        return "";
                                    }
                                    if (str_starts_with($model->value_uz, 'uploads/')) {
                                        return Html::a('Просмотр Файл', ['/' . $model->value_uz], ['target' => '_blank']);
                                    } else {
                                        return $model->value_uz;
                                    }
                                }
                            ],
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
            </div>
        </div>
    </div>
</div>
