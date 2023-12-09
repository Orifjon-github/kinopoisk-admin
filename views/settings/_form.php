<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Settings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxLength' => true, 'readonly' => true]) ?>

    <?php
    if (in_array($model->key, ['logo', 'test'])) {
        echo $form->field($model, 'value')->fileInput();
        echo $form->field($model, 'value_uz')->fileInput();
    } else {
        echo $form->field($model, 'value')->textarea(['rows' => 3]);
        echo $form->field($model, 'value_uz')->textarea(['rows' => 3]);
    }
    ?>

    <?= $form->field($model, 'enable')->dropDownList(\app\models\Socials::enableDisableTypes(), ['options' => [1 => ['selected' => true]]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
