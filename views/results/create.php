<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Results $model */

$this->title = 'Create Results';
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="results-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
