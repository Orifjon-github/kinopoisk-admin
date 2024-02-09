<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserProfiles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-profiles-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'user_id')->textInput() ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'profile_photo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'country_id')->textInput() ?>

            <?= $form->field($model, 'region_id')->textInput() ?>

            <?= $form->field($model, 'district_id')->textInput() ?>

            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'contact')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
