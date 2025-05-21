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

// Verificar si el usuario es administrador
$isAdmin = !Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin';
?>
<div class="ventas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($isAdmin): ?>
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
                'template' => $isAdmin ? '{view} {update} {delete}' : '{view}',
                'urlCreator' => function ($action, Ventas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 
                        'idventas' => $model->idventas, 
                        'clientes_idclientes' => $model->clientes_idclientes, 
                        'vehiculos_idvehiculos' => $model->vehiculos_idvehiculos]);
                },
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('Ver', $url, ['class' => 'btn btn-info']);
                    },
                    'update' => function ($url) use ($isAdmin) {
                        if ($isAdmin) {
                            return Html::a('Editar', $url, ['class' => 'btn btn-primary']);
                        }
                        return '';
                    },
                    'delete' => function ($url) use ($isAdmin) {
                        if ($isAdmin) {
                            return Html::a('Eliminar', $url, [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                        return '';
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
