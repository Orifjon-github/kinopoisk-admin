<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Rate $model */
/** @var yii\widgets\ActiveForm $form */
$model->from = date('Y-m-d H:i:s');
?>

<div class="rate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount')->input('number', ['step' => '0.01']) ?>

    <?= $form->field($model, 'from')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить курс', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
