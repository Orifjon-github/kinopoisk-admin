<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Advertisings $model */

$this->title = 'Обновить рекламу: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Реклама', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="advertisings-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
