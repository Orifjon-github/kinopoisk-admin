<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Partners $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="partners-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'link_uz')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'icon')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

            <?= $form->field($model, 'icon_uz')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>
            <?= $form->field($model, 'icon_en')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
