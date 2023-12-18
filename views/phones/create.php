<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Phones $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phones-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
