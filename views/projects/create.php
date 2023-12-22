<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Projects $model */

$this->title = 'Create Projects';
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
