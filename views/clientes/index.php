<?php

use app\models\Clientes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\ClientesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Clientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role === 'admin'): ?>
        <p>
            <?= Html::a(Yii::t('app', 'Create Clientes'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            'correo',
            'telefono',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clientes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idclientes' => $model->idclientes]);
                },
                'buttons' => [
                    'update' => function ($url, $model) {
                        // Solo mostrar el botón de edición si el usuario es admin
                        if (Yii::$app->user->identity->role === 'admin') {
                            return Html::a('Editar', $url, ['class' => 'btn btn-primary']);
                        }
                    },
                    'delete' => function ($url, $model) {
                        // Solo mostrar el botón de eliminar si el usuario es admin
                        if (Yii::$app->user->identity->role === 'admin') {
                            return Html::a('Eliminar', $url, [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
