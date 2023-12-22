<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HistoryImages $model */

$this->title = 'Create History Images';
$this->params['breadcrumbs'][] = ['label' => 'History Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
