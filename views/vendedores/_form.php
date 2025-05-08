<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Vendedores $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vendedores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el nombre del vendedor',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'correo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el correo electrónico',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'telefono')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el número de teléfono',
        'required' => true
    ]) ?>

<?php if (Yii::$app->user->identity->role === 'admin'): ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>
