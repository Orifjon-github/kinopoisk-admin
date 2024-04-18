<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Channels $model */

$this->title = 'Update Channels: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="channels-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
