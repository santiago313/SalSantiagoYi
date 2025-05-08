<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vehiculos $model */

$this->title = Yii::t('app', 'Update Vehiculos: {name}', [
    'name' => $model->idvehiculos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehiculos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idvehiculos, 'url' => ['view', 'idvehiculos' => $model->idvehiculos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vehiculos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
