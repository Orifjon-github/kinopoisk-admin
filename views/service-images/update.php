<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ServiceImages $model */

$this->title = 'Update Service Images: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-images-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
