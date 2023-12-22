<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Galleries $model */

$this->title = 'Update Galleries: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Галереи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="galleries-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
