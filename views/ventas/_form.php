<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Clientes;
use app\models\Vehiculos;
use yii;
/** @var yii\web\View $this */
/** @var app\models\Ventas $model */
/** @var yii\widgets\ActiveForm $form */

// Obtener datos relacionados
$clientes = ArrayHelper::map(Clientes::find()->all(), 'idclientes', 'nombre');
$vehiculos = ArrayHelper::map(Vehiculos::find()->all(), 'idvehiculos', function($model) {
    return $model->marca . ' ' . $model->modelo;
});

?>

<div class="ventas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clientes_idclientes')->dropDownList(
        $clientes,
        [
            'prompt' => 'Seleccione un cliente',
            'required' => true
        ]
    ) ?>

    <?= $form->field($model, 'vehiculos_idvehiculos')->dropDownList(
        $vehiculos,
        [
            'prompt' => 'Seleccione un vehículo',
            'required' => true
        ]
    ) ?>

    <?= $form->field($model, 'fechaventa')->textInput([
        'type' => 'date',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'total')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el total de la venta',
        'required' => true
    ]) ?>

<?php if (Yii::$app->user->identity->role === 'admin'): ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>
