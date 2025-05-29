<?php

use app\models\Vehiculos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\VehiculosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Vehiculos');
$this->params['breadcrumbs'][] = $this->title;

$isAdminOrCreate = !Yii::$app->user->isGuest && 
                   (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('createVehiculo'));

?>
<div class="vehiculos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($isAdminOrCreate): ?>
        <p>
            <?= Html::a(Yii::t('app', 'Create Vehiculos'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'marca',
            'modelo',
            'anio',
            'precio',
            'disponible',
            [
                'class' => ActionColumn::className(),
                'template' => $isAdminOrCreate ? '{view} {update} {delete}' : '{view}',
                'urlCreator' => function ($action, Vehiculos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idvehiculos' => $model->idvehiculos]);
                },
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('Ver', $url, ['class' => 'btn btn-info']);
                    },
                    'update' => function ($url, $model) use ($isAdminOrCreate) {
                        if ($isAdminOrCreate) {
                            return Html::a('Editar', $url, ['class' => 'btn btn-primary']);
                        }
                        return '';
                    },
                    'delete' => function ($url, $model) use ($isAdminOrCreate) {
                        if ($isAdminOrCreate) {
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
