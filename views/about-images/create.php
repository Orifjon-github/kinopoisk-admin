<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AboutImages $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'О нас Изображения  ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-images-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
