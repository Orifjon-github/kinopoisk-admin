<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Histories $model */

$this->title = 'Create Histories';
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="histories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
