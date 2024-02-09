<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'store_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'currency')->dropDownList([ 'uzs' => 'Uzs', 'usd' => 'Usd', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'enable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'availability')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sale_type')->dropDownList([ 'retail' => 'Retail', 'wholesale' => 'Wholesale', 'retail_wholesale' => 'Retail wholesale', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'additional_fields')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
