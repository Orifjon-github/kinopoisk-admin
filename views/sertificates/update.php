<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sertificates $model */

$this->title = 'Обновить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сертификаты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="certificates-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
