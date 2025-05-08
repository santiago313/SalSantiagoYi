<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Vehiculos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vehiculos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marca')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese la marca',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'modelo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el modelo',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'anio')->textInput([
        'placeholder' => 'Ingrese el año',
        'required' => true,
        'type' => 'number',
        'min' => 1900,
        'max' => date('Y')
    ]) ?>

    <?= $form->field($model, 'precio')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el precio',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'disponible')->dropDownList(
        [
            '1' => 'Sí',
            '0' => 'No'
        ],
        [
            'prompt' => 'Seleccione disponibilidad',
            'required' => true
        ]
    ) ?>

    < <?php if (Yii::$app->user->identity->role === 'admin'): ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>
