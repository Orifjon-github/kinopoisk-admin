<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Stores $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stores-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->dropDownList(['pending' => 'Pending', 'active' => 'Active', 'verified' => 'Verified',], ['prompt' => '']) ?>

            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'banner_1')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'banner_2')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'banner_3')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
