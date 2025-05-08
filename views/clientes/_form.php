<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el nombre',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'correo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el correo',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'telefono')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el teléfono',
        'required' => true
    ]) ?>

    <?php if (Yii::$app->user->identity->role === 'admin'): ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>


</div>
