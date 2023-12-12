<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Applications $model */

$this->title = 'Create Applications';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
