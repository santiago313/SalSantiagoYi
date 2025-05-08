<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ventas $model */

$this->title = Yii::t('app', 'Update Ventas: {name}', [
    'name' => $model->idventas,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idventas, 'url' => ['view', 'idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ventas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
