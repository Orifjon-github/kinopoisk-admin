<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Phones $model */

$this->title = 'Create Phones';
$this->params['breadcrumbs'][] = ['label' => 'Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
