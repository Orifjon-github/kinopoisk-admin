<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductCompositions $model */

$this->title = 'Update Product Compositions: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Compositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-compositions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
