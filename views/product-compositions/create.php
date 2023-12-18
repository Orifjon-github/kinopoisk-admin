<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductCompositions $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Product Compositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-compositions-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
