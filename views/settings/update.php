<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Settings $model */

$this->title = 'Update Settings: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="settings-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
