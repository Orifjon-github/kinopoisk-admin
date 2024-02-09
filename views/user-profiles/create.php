<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserProfiles $model */

$this->title = 'Create User Profiles';
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profiles-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
