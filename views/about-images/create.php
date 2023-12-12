<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AboutImages $model */

$this->title = 'Create About Images';
$this->params['breadcrumbs'][] = ['label' => 'About Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-images-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
