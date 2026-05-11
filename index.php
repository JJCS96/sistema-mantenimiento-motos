<?php

/*
|--------------------------------------------------------------------------
| Archivo principal del sistema
|--------------------------------------------------------------------------
| Este archivo valida si el usuario ya inició sesión.
| Si tiene sesión activa, lo envía al dashboard.
| Si no tiene sesión, lo envía al login.
*/

session_start();

require_once "config/config.php";

if (isset($_SESSION["id_usuario"])) {
    header("Location: " . BASE_URL . "views/dashboard.php");
} else {
    header("Location: " . BASE_URL . "views/auth/login.php");
}

exit();

?>