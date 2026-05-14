<?php

/*
|--------------------------------------------------------------------------
| Controlador Repuesto
|--------------------------------------------------------------------------
| Maneja:
| - Registrar repuestos
| - Actualizar repuestos
| - Eliminar repuestos
|--------------------------------------------------------------------------
*/

session_start();

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/Repuesto.php";

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
| Instanciar modelo
|--------------------------------------------------------------------------
*/

$modelo = new Repuesto();

/*
|--------------------------------------------------------------------------
| Registrar repuesto
|--------------------------------------------------------------------------
*/

if (isset($_POST["registrar"])) {

    $respuesta = $modelo->registrar(
        trim($_POST["nombre"]),
        trim($_POST["descripcion"]),
        $_POST["stock"],
        $_POST["precio"]
    );

    if ($respuesta) {
        header("Location: " . BASE_URL . "views/repuestos/index.php?success=1");
    } else {
        header("Location: " . BASE_URL . "views/repuestos/crear.php?error=1");
    }

    exit();
}

/*
|--------------------------------------------------------------------------
| Actualizar repuesto
|--------------------------------------------------------------------------
*/

if (isset($_POST["actualizar"])) {

    $respuesta = $modelo->actualizar(
        $_POST["id_repuesto"],
        trim($_POST["nombre"]),
        trim($_POST["descripcion"]),
        $_POST["stock"],
        $_POST["precio"]
    );

    if ($respuesta) {
        header("Location: " . BASE_URL . "views/repuestos/index.php?update=1");
    } else {
        header("Location: " . BASE_URL . "views/repuestos/editar.php?id=" . $_POST["id_repuesto"]);
    }

    exit();
}

/*
|--------------------------------------------------------------------------
| Eliminar repuesto
|--------------------------------------------------------------------------
*/

if (isset($_GET["eliminar"])) {

    $respuesta = $modelo->eliminar($_GET["eliminar"]);

    if ($respuesta) {
        header("Location: " . BASE_URL . "views/repuestos/index.php?delete=1");
    } else {
        header("Location: " . BASE_URL . "views/repuestos/index.php?error=1");
    }

    exit();
}

?>