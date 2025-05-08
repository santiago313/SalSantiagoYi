<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vendedores $model */

$this->title = Yii::t('app', 'Create Vendedores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
