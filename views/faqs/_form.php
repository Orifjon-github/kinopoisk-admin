<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Faqs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="faqs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'question_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'enable')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
