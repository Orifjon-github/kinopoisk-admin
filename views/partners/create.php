<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Partners $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
