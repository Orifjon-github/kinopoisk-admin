<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Projects $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="projects-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

            <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'short_description_uz')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'short_description_en')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
