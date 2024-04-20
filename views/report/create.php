<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Report $model */

$this->title = 'Создать заявку';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->widget(MaskedInput::class, ['mask' => 'AA999A99']) ?> 

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать заявку', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
