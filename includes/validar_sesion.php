<?php

/*
|--------------------------------------------------------------------------
| Validación central de sesión
|--------------------------------------------------------------------------
| Este archivo protege las rutas privadas del sistema.
| Si el usuario no tiene sesión activa, se envía al login.
*/

require_once __DIR__ . "/../config/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id_usuario"])) {
    header("Location: " . BASE_URL . "views/auth/login.php");
    exit();
}
