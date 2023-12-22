<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Partners $model */

$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="partners-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
