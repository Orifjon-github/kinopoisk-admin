<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categories-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'parent_id')->dropDownList(\app\models\Categories::all()) ?>

            <?= $form->field($model, 'order')->textInput() ?>

            <?= $form->field($model, 'photo')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
