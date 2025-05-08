<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Detalleventa $model */

$this->title = $model->iddetalleventa;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalleventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalleventa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('updateDetalleventa', ['iddetalleventa' => $model->iddetalleventa]))): ?>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'iddetalleventa' => $model->iddetalleventa, 'ventas_idventas' => $model->ventas_idventas, 'vendedores_idvendedores' => $model->vendedores_idvendedores], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'iddetalleventa' => $model->iddetalleventa, 'ventas_idventas' => $model->ventas_idventas, 'vendedores_idvendedores' => $model->vendedores_idvendedores], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ventas_idventas',
            'vendedores_idvendedores',
            'observaciones:ntext',
        ],
    ]) ?>

</div>
