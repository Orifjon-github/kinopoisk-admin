<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Homes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="homes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'title_uz')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'description_uz')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

    <?= $form->field($model, 'image_uz')->fileInput(['class' => 'form-control', 'id' => 'formFile']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
