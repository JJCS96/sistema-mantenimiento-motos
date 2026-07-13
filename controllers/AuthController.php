<?php

/*
|--------------------------------------------------------------------------
| Controlador de autenticación
|--------------------------------------------------------------------------
| Este archivo controla el inicio y cierre de sesión.
| La autenticación mantiene compatibilidad con contraseñas en texto plano
| del proyecto académico, pero también permite contraseñas con hash.
*/

session_start();

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/Usuario.php";

$usuarioModel = new Usuario();

/*
|--------------------------------------------------------------------------
| Validar acción recibida por URL
|--------------------------------------------------------------------------
| Ejemplo:
| AuthController.php?action=login
| AuthController.php?action=logout
*/

if (isset($_GET["action"])) {

    /*
    |--------------------------------------------------------------------------
    | Acción: login
    |--------------------------------------------------------------------------
    | Valida el usuario y la contraseña ingresada.
    */
    if ($_GET["action"] == "login") {

        // Recibir datos del formulario
        $usuario = trim($_POST["usuario"] ?? "");
        $password = trim($_POST["password"] ?? "");

        if ($usuario === "" || $password === "") {
            header("Location: " . BASE_URL . "views/auth/login.php?error=1");
            exit();
        }

        // Buscar usuario en la base de datos
        $datosUsuario = $usuarioModel->buscarPorUsuario($usuario);

        /*
        |--------------------------------------------------------------------------
        | Validación temporal sin hash
        |--------------------------------------------------------------------------
        | Se compara directamente la contraseña ingresada
        | con la contraseña guardada en la base de datos.
        */
        $passwordValida = false;

        if ($datosUsuario) {
            $infoHash = password_get_info($datosUsuario["password"]);

            if (!empty($infoHash["algo"])) {
                $passwordValida = password_verify($password, $datosUsuario["password"]);
            } else {
                $passwordValida = hash_equals($datosUsuario["password"], $password);
            }
        }

        if ($datosUsuario && $passwordValida) {

            // Guardar datos del usuario en sesión
            session_regenerate_id(true);
            $_SESSION["id_usuario"] = $datosUsuario["id_usuario"];
            $_SESSION["nombre"] = $datosUsuario["nombre"];
            $_SESSION["usuario"] = $datosUsuario["usuario"];
            $_SESSION["rol"] = $datosUsuario["rol"];

            // Redirigir al dashboard
            header("Location: " . BASE_URL . "views/dashboard.php?login=success");
            exit();

        } else {

            // Redirigir al login si los datos son incorrectos
            header("Location: " . BASE_URL . "views/auth/login.php?error=1");
            exit();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Acción: logout
    |--------------------------------------------------------------------------
    | Cierra la sesión del usuario.
    */
    if ($_GET["action"] == "logout") {

        session_destroy();

        header("Location: " . BASE_URL . "views/auth/login.php?logout=1");
        exit();
    }
}

?>
