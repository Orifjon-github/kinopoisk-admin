<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductImages $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Product Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-images-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
