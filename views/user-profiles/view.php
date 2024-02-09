<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserProfiles $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-profiles-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'user_id',
                    'description:ntext',
                    'profile_photo',
                    'country_id',
                    'region_id',
                    'district_id',
                    'address:ntext',
                    'contact:ntext',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
