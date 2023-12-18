<?php

use app\models\Applications;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ApplicationsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">
    <div class="card">
        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'phone',
                    'email:email',
                    [
                        'attribute' => 'description',
                        'value' => function (Applications $model) {
                            if ($model->type == 'order') {
                                return '';
//                        return json_encode(unserialize($model->description), JSON_PRETTY_PRINT);
                            }
                            return $model->description;
                        }
                    ],
                    [
                        'attribute' => 'type',
                        'value' => function (Applications $model) {
                            return Applications::AppTypes($model->type);
                        },
                        'filter' => Applications::AppTypes()
                    ],
                    //'created_at',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Applications $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>
