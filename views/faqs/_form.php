<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Faqs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="faqs-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'question')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'question_uz')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'answer')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'answer_uz')->textarea(['rows' => 3]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
