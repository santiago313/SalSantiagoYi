<?php

use app\models\Vendedores;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\VendedoresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Vendedores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->role === 'admin' || Yii::$app->user->can('createVendedor'))): ?>
        <?= Html::a(Yii::t('app', 'Create Vendedores'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>
</p>


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
                'urlCreator' => function ($action, Vendedores $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idvendedores' => $model->idvendedores]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
