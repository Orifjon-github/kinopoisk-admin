<?php

use app\models\Applications;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Applications $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="applications-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                    'phone',
                    'email:email',
                    'address',
                    [
                        'attribute' => 'description',
                        'value' => function (Applications $model) {
                            if ($model->type == 'order') {
                                return '';
                            }
                            return $model->description;
                        }
                    ],
                    [
                        'attribute' => 'type',
                        'value' => function (Applications $model) {
                            return Applications::AppTypes($model->type);
                        }
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
<?php if ($orders) { ?>
    <div class="card">
        <div class="card-body">
            <?= GridView::widget([
            'dataProvider' => $orders,
            'columns' => [
            'id',
            'name',
            'count',
            ],
            ]); ?>
        </div>
    </div>
<?php }