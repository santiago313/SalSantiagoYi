<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Clientes $model */

$this->title = Yii::t('app', 'Update Clientes: {name}', [
    'name' => $model->idclientes,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idclientes, 'url' => ['view', 'idclientes' => $model->idclientes]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="clientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
