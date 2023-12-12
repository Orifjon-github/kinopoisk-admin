<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PartnersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="partners-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_uz') ?>

    <?= $form->field($model, 'link') ?>

    <?= $form->field($model, 'link_uz') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'icon_uz') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
