<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Report $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'number')->widget(MaskedInput::class, ['mask' => 'AA999A99']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(
        ['1' => 'Новое', '2' => 'Подтверждено', '3' => 'Отклонено']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
