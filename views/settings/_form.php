<?php

use app\models\Settings;
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
    if (in_array($model->key, Settings::fileKeys())) {
        $key = Settings::settingKeys($model->key) ?? $model->key;
        echo $form->field($model, 'value')->label(false)->fileInput();
        echo $form->field($model, 'value_uz')->label(false)->fileInput();
    } else {
        echo $form->field($model, 'value')->textarea(['rows' => 3]);
        echo $form->field($model, 'value_uz')->textarea(['rows' => 3]);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
