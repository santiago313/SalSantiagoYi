<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ventas;
use app\models\Vendedores;

/** @var yii\web\View $this */
/** @var app\models\Detalleventa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalleventa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ventas_idventas')->dropDownList(
        ArrayHelper::map(Ventas::find()->all(), 'idventas','fechaventa'), // Asume que 'nombre' es el campo que deseas mostrar
        [
            'prompt' => 'Seleccione una venta',
            'required' => true
        ]
    ) ?>

    <?= $form->field($model, 'vendedores_idvendedores')->dropDownList(
        ArrayHelper::map(Vendedores::find()->all(), 'idvendedores', 'nombre'), // Asume que 'nombre' es el campo que deseas mostrar
        [
            'prompt' => 'Seleccione un vendedor',
            'required' => true
        ]
    ) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?php if (Yii::$app->user->identity->role === 'admin'): ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>
