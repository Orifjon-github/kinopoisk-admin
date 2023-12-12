<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AboutImages $model */

$this->title = 'Update About Images: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'About Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="about-images-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
