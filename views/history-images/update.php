<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryImages $model */

$this->title = 'Update History Images: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'History Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="history-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
