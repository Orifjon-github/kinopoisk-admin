<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Homes $model */

$this->title = 'Create Homes';
$this->params['breadcrumbs'][] = ['label' => 'Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
