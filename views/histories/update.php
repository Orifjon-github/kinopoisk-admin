<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Histories $model */

$this->title = 'Update Histories: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Истории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="histories-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
