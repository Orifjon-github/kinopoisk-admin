<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stores $model */

$this->title = 'Update Stores: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stores-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
