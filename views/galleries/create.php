<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Galleries $model */

$this->title = 'Create Galleries';
$this->params['breadcrumbs'][] = ['label' => 'Галереи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
