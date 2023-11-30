<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Homes $model */

$this->title = 'Update Homes: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="homes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
