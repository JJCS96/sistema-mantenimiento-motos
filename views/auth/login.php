<?php

/*
|--------------------------------------------------------------------------
| Vista login
|--------------------------------------------------------------------------
| Pantalla donde el usuario ingresa al sistema.
*/

session_start();

require_once "../../config/config.php";

// Si el usuario ya inició sesión, lo enviamos al dashboard
if (isset($_SESSION["id_usuario"])) {
    header("Location: " . BASE_URL . "views/dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Motos</title>

    <!-- Bootstrap para estilos rápidos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/estilos.css">
</head>

<body class="login-body">

<div class="login-container">

    <div class="login-card shadow">

        <div class="login-logo">
            🏍️ 🔧
        </div>

        <h4 class="text-center mt-3">Sistema de</h4>
        <h4 class="text-center fw-bold">Mantenimiento de Motos</h4>

        <p class="text-center text-muted">
            Bienvenido, por favor inicie sesión
        </p>

        <!-- Formulario de login -->
        <form action="<?php echo BASE_URL; ?>controllers/AuthController.php?action=login" method="POST">

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input 
                    type="text" 
                    name="usuario" 
                    class="form-control" 
                    placeholder="Ingrese su usuario" 
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Ingrese su contraseña" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-dark w-100">
                Iniciar sesión
            </button>

        </form>

    </div>

</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Alerta de error -->
<?php if (isset($_GET["error"])) { ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Acceso denegado',
    text: 'Usuario o contraseña incorrectos',
    confirmButtonText: 'Intentar nuevamente'
});
</script>
<?php } ?>

<!-- Alerta de cierre de sesión -->
<?php if (isset($_GET["logout"])) { ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Sesión cerrada',
    text: 'Has cerrado sesión correctamente',
    timer: 1800,
    showConfirmButton: false
});
</script>
<?php } ?>

</body>
</html>