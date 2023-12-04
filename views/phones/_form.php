<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Phones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="phones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
