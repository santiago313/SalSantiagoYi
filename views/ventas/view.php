<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Ventas $model */

$this->title = $model->idventas;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ventas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('updateVenta', ['idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos]))): ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos], ['class' => 'btn btn-primary']) ?>
    <?php endif; ?>

    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('deleteVenta', ['idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos]))): ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    <?php endif; ?>
</p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idventas',
            'clientes_idclientes',
            'vehiculos_idvehiculos',
            'fechaventa',
            'total',
        ],
    ]) ?>

</div>
