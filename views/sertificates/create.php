<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sertificates $model */

$this->title = 'Добавить новое';
$this->params['breadcrumbs'][] = ['label' => 'Сертификаты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificates-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
