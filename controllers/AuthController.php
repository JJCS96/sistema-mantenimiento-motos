<?php

/*
|--------------------------------------------------------------------------
| Controlador de autenticación
|--------------------------------------------------------------------------
| Este archivo controla el inicio y cierre de sesión.
| 
| NOTA:
| Por el momento la contraseña se valida en texto plano.
| Ejemplo:
| Si en la base de datos password = '1234',
| el usuario debe ingresar exactamente '1234'.
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
        $usuario = trim($_POST["usuario"]);
        $password = trim($_POST["password"]);

        // Buscar usuario en la base de datos
        $datosUsuario = $usuarioModel->buscarPorUsuario($usuario);

        /*
        |--------------------------------------------------------------------------
        | Validación temporal sin hash
        |--------------------------------------------------------------------------
        | Se compara directamente la contraseña ingresada
        | con la contraseña guardada en la base de datos.
        */
        if ($datosUsuario && $password == $datosUsuario["password"]) {

            // Guardar datos del usuario en sesión
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