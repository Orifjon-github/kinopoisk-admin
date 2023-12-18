<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sertificates $model */

$this->title = 'Update Sertificates: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sertificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="sertificates-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
