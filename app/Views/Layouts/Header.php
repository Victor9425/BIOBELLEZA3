<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/Styles.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <a href="<?php echo BASE_URL; ?>">🌱 Bio Belleza</a>
        </div>

<nav class="navbar">
    <ul class="nav-links">
        <li><a href="<?php echo BASE_URL; ?>">Inicio</a></li>
        <li><a href="<?php echo BASE_URL; ?>productos">Productos</a></li>
        <li><a href="<?php echo BASE_URL; ?>recetas">Recetas</a></li>
        <li><a href="<?php echo BASE_URL; ?>consejos">Consejos</a></li>
<?php if (isset($_SESSION['usuario_id'])): ?>
    <li class="user-menu-item">
        <a href="<?php echo BASE_URL; ?>perfil" class="user-link">
            👤 <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>
        </a>
        <ul class="dropdown-menu">
            <?php if (isset($_SESSION['rol_id']) && $_SESSION['rol_id'] == 1): ?>
                <li><a href="<?php echo BASE_URL; ?>admin/dashboard">Panel Admin</a></li>
            <?php endif; ?>
            <li><a href="<?php echo BASE_URL; ?>logout">Cerrar Sesión</a></li>
        </ul>
    </li>
<?php else: ?>
    <li><a href="<?php echo BASE_URL; ?>login">Ingresar</a></li>
    <li><a href="<?php echo BASE_URL; ?>registro">Registrarse</a></li>
<?php endif; ?>
    </ul>
</nav>
    </header>
    <main class="main-container">