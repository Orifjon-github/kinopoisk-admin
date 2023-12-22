<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Testimonials $model */

$this->title = 'Обновить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="testimonials-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
