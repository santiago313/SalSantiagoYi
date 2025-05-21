<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-md navbar-dark bg-primary fixed-top shadow-sm']
    ]);

    echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => array_filter([
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Acerca de Nosotros', 'url' => ['/site/about']],
        ['label' => 'Contáctanos', 'url' => ['/site/contact']],

        !Yii::$app->user->isGuest ? [
            'label' => 'Gestionar Tienda',
            'items' => array_filter([
                ['label' => 'Clientes', 'url' => ['/clientes/index']],
                ['label' => 'Vehículos', 'url' => ['/vehiculos/index']],
                ['label' => 'Vendedores', 'url' => ['/vendedores/index']],
                ['label' => 'Ventas', 'url' => ['/ventas/index']],
                ['label' => 'Detalle de ventas', 'url' => ['/detalleventa/index']],
                Yii::$app->user->identity->role === 'admin'
                    ? ['label' => 'Usuarios', 'url' => ['/user/index']]
                    : null,
            ], fn($item) => !is_null($item)),
        ] : null,

        Yii::$app->user->isGuest
            ? ['label' => 'Iniciar Sesión', 'url' => ['/site/login']]
            : ['label' => 'Cambiar contraseña', 'url' => ['/user/change-password']],

        Yii::$app->user->isGuest
            ? null
            : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Cerrar Sesión (' 
                    . Html::encode(Yii::$app->user->identity->apellido . ' ' . Yii::$app->user->identity->nombre) 
                    . ') ' . Html::encode(Yii::$app->user->identity->role),
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>',
    ], fn($item) => !is_null($item)),
]);


    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main" style="padding-top: 80px;">
    <div class="container py-4">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-4 bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
