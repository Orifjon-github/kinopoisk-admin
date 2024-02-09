<?php

use app\models\Users;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <div class="card">
        <div class="card-body">
<!--            <p>-->
<!--                --><?php //= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
<!--            </p>-->

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'username',
                    'status',
                    'created_at',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Users $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
