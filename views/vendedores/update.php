<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vendedores $model */

$this->title = Yii::t('app', 'Update Vendedores: {name}', [
    'name' => $model->idvendedores,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idvendedores, 'url' => ['view', 'idvendedores' => $model->idvendedores]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vendedores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
