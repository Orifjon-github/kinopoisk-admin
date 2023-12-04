<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductCompositions $model */

$this->title = 'Create Product Compositions';
$this->params['breadcrumbs'][] = ['label' => 'Product Compositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-compositions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
