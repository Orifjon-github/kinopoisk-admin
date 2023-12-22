<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Projects $model */

$this->title = 'Update Projects: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="projects-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
