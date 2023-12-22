<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryImages $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'History Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-images-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
