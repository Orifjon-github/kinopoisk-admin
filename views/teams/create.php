<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teams $model */

$this->title = 'Create Teams';
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teams-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
