<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PostImages $model */

$this->title = 'Create Post Images';
$this->params['breadcrumbs'][] = ['label' => 'Post Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-images-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
