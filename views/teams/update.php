<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teams $model */

$this->title = 'Update Teams: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teams-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
