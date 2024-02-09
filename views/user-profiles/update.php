<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserProfiles $model */

$this->title = 'Update User Profiles: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-profiles-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
