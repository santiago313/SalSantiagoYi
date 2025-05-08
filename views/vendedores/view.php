<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Vendedores $model */

$this->title = $model->idvendedores;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vendedores-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('updateVendedor', ['idvendedores' => $model->idvendedores]))): ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idvendedores' => $model->idvendedores], ['class' => 'btn btn-primary']) ?>
    <?php endif; ?>

    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('deleteVendedor', ['idvendedores' => $model->idvendedores]))): ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idvendedores' => $model->idvendedores], [
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
            'nombre',
            'correo',
            'telefono',
        ],
    ]) ?>

</div>
