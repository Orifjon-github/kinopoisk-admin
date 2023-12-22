<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductImages $model */

$this->title = 'Обновить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="product-images-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
