<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sertificates $model */

$this->title = 'Create Sertificates';
$this->params['breadcrumbs'][] = ['label' => 'Sertificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertificates-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
