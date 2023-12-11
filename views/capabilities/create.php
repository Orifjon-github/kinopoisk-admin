<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Capabilities $model */

$this->title = 'Create Capabilities';
$this->params['breadcrumbs'][] = ['label' => 'Capabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capabilities-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
