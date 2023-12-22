<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectImages $model */

$this->title = 'Update Project Images: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-images-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
