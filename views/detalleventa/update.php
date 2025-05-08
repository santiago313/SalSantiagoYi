<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalleventa $model */

$this->title = Yii::t('app', 'Update Detalleventa: {name}', [
    'name' => $model->iddetalleventa,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalleventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetalleventa, 'url' => ['view', 'iddetalleventa' => $model->iddetalleventa, 'ventas_idventas' => $model->ventas_idventas, 'vendedores_idvendedores' => $model->vendedores_idvendedores]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detalleventa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
