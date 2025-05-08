<?php

use app\models\Ventas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\VentasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Ventas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('createVenta'))): ?>
        <?= Html::a(Yii::t('app', 'Create Ventas'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>
</p>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'clientes_idclientes',
            'vehiculos_idvehiculos',
            'fechaventa',
            'total',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ventas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idventas' => $model->idventas, 'clientes_idclientes' => $model->clientes_idclientes, 'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
