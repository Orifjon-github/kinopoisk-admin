<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Movies $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="movies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'caption')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
