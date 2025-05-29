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
    <!-- Font Awesome 6 con iconos realistas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css para animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        :root {
            --primary-color: #3498db;
            --hover-color: #2980b9;
            --transition-speed: 0.3s;
        }
        
        .navbar {
            min-height: 56px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand, .nav-link {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            display: flex;
            align-items: center;
            transition: all var(--transition-speed) ease;
        }
        
        .navbar-brand {
            font-weight: 600;
            font-size: 1.25rem;
        }
        
        .navbar-brand i {
            color: #f1c40f;
            margin-right: 0.5rem;
            transition: transform 0.5s ease;
        }
        
        .navbar-brand:hover i {
            transform: rotate(15deg);
        }
        
        .nav-link {
            position: relative;
            margin: 0 0.25rem;
            border-radius: 4px;
        }
        
        .nav-link i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
            transition: transform var(--transition-speed) ease;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link:hover i {
            transform: scale(1.2);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: #f1c40f;
            transition: all var(--transition-speed) ease;
        }
        
        .nav-link:hover::after {
            width: 80%;
            left: 10%;
        }
        
        .dropdown-item {
            transition: all var(--transition-speed) ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white;
            padding-left: 1.5rem;
        }
        
        .dropdown-item:hover i {
            color: #f1c40f;
            transform: scale(1.1);
        }
        
        .logout {
            text-align: left;
        }
        
        /* Animaciones específicas */
        .animate-bounce {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        /* Efecto para el footer */
        footer i {
            transition: transform 0.5s ease, color 0.3s ease;
        }
        
        footer i:hover {
            transform: rotate(360deg);
            color: #f1c40f;
        }
        
        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .navbar-nav {
                padding-top: 1rem;
            }
            
            .nav-link {
                margin: 0.25rem 0;
            }
            
            .nav-link::after {
                display: none;
            }
        }
    </style>
</head>

<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::tag('span', '', ['class' => 'fas fa-car me-2 animate-bounce']) . 'Ventas de Carros',
        'brandUrl' => Yii::$app->homeUrl,
<<<<<<< HEAD
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-primary fixed-top shadow-sm animate__animated animate__fadeInDown',
        ]
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav w-100'],
        'encodeLabels' => false,
        'items' => array_filter([
            ['label' => '<i class="fas fa-home me-1"></i> Inicio', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'nav-link animate__animated animate__fadeIn']],

            !Yii::$app->user->isGuest ? [
                'label' => '<i class="fas fa-cogs me-1"></i> Gestionar Carros',
                'items' => array_filter([
                    ['label' => '<i class="fas fa-user-friends me-1"></i> Clientes', 'url' => ['/clientes/index']],
                    ['label' => '<i class="fas fa-car-side me-1"></i> Vehículos', 'url' => ['/vehiculos/index']],
                    ['label' => '<i class="fas fa-user-tie me-1"></i> Vendedores', 'url' => ['/vendedores/index']],
                    ['label' => '<i class="fas fa-file-invoice-dollar me-1"></i> Ventas', 'url' => ['/ventas/index']],
                    ['label' => '<i class="fas fa-list-ul me-1"></i> Detalle de ventas', 'url' => ['/detalleventa/index']],
                    Yii::$app->user->identity->role === 'admin'
                        ? ['label' => '<i class="fas fa-users-cog me-1"></i> Usuarios', 'url' => ['/user/index']]
                        : null,
                ], fn($item) => !is_null($item)),
                'linkOptions' => ['class' => 'nav-link animate__animated animate__fadeIn'],
                'dropdownOptions' => ['class' => 'dropdown-menu animate__animated animate__fadeIn']
            ] : null,

            Yii::$app->user->isGuest
                ? ['label' => '<i class="fas fa-sign-in-alt me-1"></i> Iniciar Sesión', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'nav-link animate__animated animate__fadeIn']]
                : ['label' => '<i class="fas fa-key me-1"></i> Cambiar contraseña', 'url' => ['/user/change-password'], 'linkOptions' => ['class' => 'nav-link animate__animated animate__fadeIn']],

            !Yii::$app->user->isGuest
                ? ['label' => '<i class="fas fa-sign-out-alt me-1"></i> Cerrar Sesión (' 
                    . Html::encode(Yii::$app->user->identity->apellido . ' ' . Yii::$app->user->identity->nombre) 
                    . ') ' . Html::encode(Yii::$app->user->identity->role),
                    'url' => ['/site/logout'],
                    'linkOptions' => [
                        'class' => 'nav-link animate__animated animate__fadeIn',
                        'data-method' => 'post'
                    ]
                ]
                : null,
        ], fn($item) => !is_null($item)),
    ]);
=======
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

>>>>>>> 379cb54a1f5c185c4398fe3afa9929176f20f814

    NavBar::end();
    ?>
</header>

<<<<<<< HEAD
<main id="main" class="flex-shrink-0" role="main">
    <?php
    $controller = Yii::$app->controller->id;
    $action = Yii::$app->controller->action->id;

    // Define controladores o acciones que se consideren "gestión"
    $isGestion = in_array($controller, ['clientes', 'vehiculos', 'vendedores', 'ventas', 'detalleventa', 'user']);
    ?>

    <?php if ($isGestion): ?>
        <div class="container py-6">
    <?php else: ?>
        <div class="container py-2">
    <?php endif; ?>

=======
<main id="main" class="flex-shrink-0" role="main" style="padding-top: 80px;">
    <div class="container py-4">
>>>>>>> 379cb54a1f5c185c4398fe3afa9929176f20f814
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<<<<<<< HEAD

<footer id="footer" class="mt-auto py-4 bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <i class="fas fa-copyright me-1"></i> My Company <?= date('Y') ?>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <i class="fas fa-bolt me-1"></i> <?= Yii::powered() ?>
            </div>
=======
<footer id="footer" class="mt-auto py-4 bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
>>>>>>> 379cb54a1f5c185c4398fe3afa9929176f20f814
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
