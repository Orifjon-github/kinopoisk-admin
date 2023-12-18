<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Phones $model */

$this->title = 'Update Phones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="phones-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
