<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Advertisings $model */

$this->title = 'Создать рекламу';
$this->params['breadcrumbs'][] = ['label' => 'Реклама', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisings-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
