<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectImages $model */

$this->title = 'Create Project Images';
$this->params['breadcrumbs'][] = ['label' => 'Project Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-images-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
