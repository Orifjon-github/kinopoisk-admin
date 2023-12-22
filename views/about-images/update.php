<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AboutImages $model */

$this->title = 'Обновить' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'About Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="about-images-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
