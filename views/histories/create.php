<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Histories $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Истории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="histories-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
