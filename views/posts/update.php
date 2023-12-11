<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts $model */

$this->title = 'Update Posts: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posts-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
