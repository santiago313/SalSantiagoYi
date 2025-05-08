<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Vehiculos $model */

$this->title = $model->idvehiculos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehiculos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehiculos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('updateVehiculo', ['idvehiculos' => $model->idvehiculos]))): ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idvehiculos' => $model->idvehiculos], ['class' => 'btn btn-primary']) ?>
    <?php endif; ?>

    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('deleteVehiculo', ['idvehiculos' => $model->idvehiculos]))): ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idvehiculos' => $model->idvehiculos], [
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

            'marca',
            'modelo',
            'anio',
            'precio',
            'disponible',
        ],
    ]) ?>

</div>
