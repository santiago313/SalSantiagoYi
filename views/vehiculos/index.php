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
?>
<div class="vehiculos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('createVehiculo'))): ?>
        <?= Html::a(Yii::t('app', 'Create Vehiculos'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>
</p>


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
                'urlCreator' => function ($action, Vehiculos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idvehiculos' => $model->idvehiculos]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
