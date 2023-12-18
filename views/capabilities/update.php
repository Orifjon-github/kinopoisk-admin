<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Capabilities $model */

$this->title = 'Update Capabilities: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Capabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="capabilities-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
