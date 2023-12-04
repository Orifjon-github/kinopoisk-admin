<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Advantages $model */

$this->title = 'Update Advantages: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advantages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
