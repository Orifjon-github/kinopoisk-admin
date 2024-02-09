<?php

use app\models\UserProfiles;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\UserProfilesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profiles-index">
    <div class="card">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'user_id',
                    'description:ntext',
                    'profile_photo',
                    'country_id',
                    //'region_id',
                    //'district_id',
                    //'address:ntext',
                    //'contact:ntext',
                    //'created_at',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, UserProfiles $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
