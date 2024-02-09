<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stores $model */

$this->title = 'Create Stores';
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stores-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
