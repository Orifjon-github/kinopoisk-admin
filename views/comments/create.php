<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Comments $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
