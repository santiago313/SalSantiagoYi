<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'role',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {reset-password}',
                'buttons' => [
                    'reset-password' => function ($url, $model, $key) {
                        return Html::a('Reset Password', ['reset-password', 'id' => $model->id], [
                            'class' => 'btn btn-warning btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to reset the password for this user?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
