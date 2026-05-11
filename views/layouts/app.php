<?php

/*
|--------------------------------------------------------------------------
| Layout principal del sistema
|--------------------------------------------------------------------------
| Este archivo contiene toda la estructura visual general:
| - Validación de sesión
| - HTML base
| - Sidebar
| - Topbar
| - Contenido dinámico
| - Scripts generales
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../config/config.php";

// Validar que el usuario haya iniciado sesión
if (!isset($_SESSION["id_usuario"])) {
    header("Location: " . BASE_URL . "views/auth/login.php");
    exit();
}

// Si no se define título, se usa uno por defecto
if (!isset($titulo)) {
    $titulo = "Sistema de Mantenimiento de Motos";
}

// Si no se define contenido, se evita error
if (!isset($contenido)) {
    $contenido = "";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/estilos.css">
</head>
<body>

<div class="app-container">

    <!-- Menú lateral -->
    <div class="sidebar">

        <div class="sidebar-title">
            <div class="sidebar-icon">🏍️</div>
            <div>
                <strong>Sistema de</strong><br>
                <span>Mantenimiento de Motos</span>
            </div>
        </div>

        <a href="<?php echo BASE_URL; ?>views/dashboard.php" class="sidebar-link">
            Dashboard
        </a>

        <a href="<?php echo BASE_URL; ?>views/clientes/index.php" class="sidebar-link">
            Clientes
        </a>

        <a href="<?php echo BASE_URL; ?>views/motos/index.php" class="sidebar-link">
            Motos
        </a>

        <a href="#" class="sidebar-link">
            Mantenimientos
        </a>

        <a href="#" class="sidebar-link">
            Repuestos
        </a>

        <a href="<?php echo BASE_URL; ?>controllers/AuthController.php?action=logout" class="sidebar-link logout">
            Cerrar sesión
        </a>

    </div>

    <!-- Contenido principal -->
    <div class="main-content">

        <!-- Barra superior -->
        <div class="topbar">
            <span></span>

            <div>
                <strong><?php echo $_SESSION["nombre"]; ?></strong>
                <small class="text-muted ms-2">
                    <?php echo $_SESSION["rol"]; ?>
                </small>
            </div>
        </div>

        <!-- Aquí se carga el contenido de cada vista -->
        <?php echo $contenido; ?>

    </div>

</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JS propio -->
<script src="<?php echo BASE_URL; ?>public/js/funciones.js"></script>

</body>
</html>