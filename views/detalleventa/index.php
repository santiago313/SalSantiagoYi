<?php

use app\models\Detalleventa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\DetalleventaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detalleventas');
$this->params['breadcrumbs'][] = $this->title;

// Definir permisos
$isAdmin = !Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin';
$canCreate = !Yii::$app->user->isGuest && ($isAdmin || Yii::$app->user->can('createDetalleventa'));

?>
<div class="detalleventa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if ($canCreate): ?>
        <?= Html::a(Yii::t('app', 'Create Detalleventa'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ventas_idventas',
            'vendedores_idvendedores',
            'observaciones:ntext',
            [
                'class' => ActionColumn::className(),
                'template' => $isAdmin ? '{view} {update} {delete}' : '{view}',
                'urlCreator' => function ($action, Detalleventa $model, $key, $index, $column) {
                    return Url::toRoute([
                        $action,
                        'iddetalleventa' => $model->iddetalleventa,
                        'ventas_idventas' => $model->ventas_idventas,
                        'vendedores_idvendedores' => $model->vendedores_idvendedores,
                    ]);
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
                                    'confirm' => '¿Estás seguro de eliminar este registro?',
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
