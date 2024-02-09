<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var app\models\UserProfiles $profile */
/** @var app\models\Stores $store */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>User</h3>
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
                            'name',
                            'username',
                            'email_verified_at:email',
                            'password',
                            'status',
                            'remember_token',
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
                <?php if ($profile): ?>
                    <div class="col-md-6">
                        <h3>Profile</h3>
                        <p>
                            <?= Html::a('Update', ['update', 'id' => $profile['id']], ['class' => 'btn btn-primary']) ?>
<!--                            --><?php //= Html::a('Delete', ['delete', 'id' => $profile['id']], [
//                                'class' => 'btn btn-danger',
//                                'data' => [
//                                    'confirm' => 'Are you sure you want to delete this item?',
//                                    'method' => 'post',
//                                ],
//                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $profile,
                            'attributes' => [
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
                <?php endif; ?>
            </div>
            <?php if ($store): ?>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Store</h3>
                        <p>
                            <?= Html::a('Update', ['/stores/update', 'id' => $store['id']], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['/stores/delete', 'id' => $store['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $store,
                            'attributes' => [
                                'name',
                                'description:ntext',
                                'image',
                                'status',
                                'address:ntext',
                                'banner_1:ntext',
                                'banner_2:ntext',
                                'banner_3:ntext',
                                'created_at',
                                'updated_at',
                            ],
                        ]) ?>
                    </div>
                </div>
            <?php else: ?>
                <p>
                    <?= Html::a('Create Store for User', ['/stores/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>
