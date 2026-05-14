<?php

/*
|--------------------------------------------------------------------------
| Layout principal del sistema
|--------------------------------------------------------------------------
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../config/config.php";

/*
|--------------------------------------------------------------------------
| Validar sesión
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION["id_usuario"])) {

    header("Location: " . BASE_URL . "views/auth/login.php");
    exit();
}

/*
|--------------------------------------------------------------------------
| Variables por defecto
|--------------------------------------------------------------------------
*/

if (!isset($titulo)) {
    $titulo = "Sistema de Mantenimiento de Motos";
}

if (!isset($contenido)) {
    $contenido = "";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $titulo; ?></title>

    <!-- Bootstrap -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link 
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- CSS propio -->
    <link 
        rel="stylesheet"
        href="<?php echo BASE_URL; ?>public/css/estilos.css"
    >

</head>

<body>

    <div class="app-container">

        <!-- Sidebar -->
        <?php include __DIR__ . "/sidebar.php"; ?>

        <!-- Contenido principal -->
        <div class="main-content">

            <!-- Topbar -->
            <div class="topbar">

                <div></div>

                <div>

                    <strong>
                        <?php echo $_SESSION["nombre"]; ?>
                    </strong>

                    <small class="text-muted ms-2">
                        <?php echo $_SESSION["rol"]; ?>
                    </small>

                </div>

            </div>

            <!-- Contenido dinámico -->
            <?php echo $contenido; ?>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS propio -->
    <script src="<?php echo BASE_URL; ?>public/js/funciones.js"></script>

    <!-- Alertas -->
    <?php echo $alerta ?? ''; ?>

</body>

</html>