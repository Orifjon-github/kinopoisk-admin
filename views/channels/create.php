<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Channels $model */

$this->title = 'Create Channels';
$this->params['breadcrumbs'][] = ['label' => 'Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="channels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
