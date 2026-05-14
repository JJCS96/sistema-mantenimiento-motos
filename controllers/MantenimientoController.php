<?php

/*
|--------------------------------------------------------------------------
| Controlador Mantenimiento
|--------------------------------------------------------------------------
| Maneja:
| - Registrar mantenimientos
| - Actualizar mantenimientos
| - Eliminar mantenimientos
|--------------------------------------------------------------------------
*/

session_start();

/*
|--------------------------------------------------------------------------
| Importar archivos necesarios
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/Mantenimiento.php";

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

$modelo = new Mantenimiento();

/*
|--------------------------------------------------------------------------
| Registrar mantenimiento
|--------------------------------------------------------------------------
*/

if (isset($_POST["registrar"])) {

    $respuesta = $modelo->registrar(

        $_POST["id_moto"],
        $_POST["fecha"],
        trim($_POST["descripcion"]),
        $_POST["costo"],
        $_POST["estado"]

    );

    /*
    |--------------------------------------------------------------------------
    | Validar respuesta
    |--------------------------------------------------------------------------
    */

    if ($respuesta) {

        header("Location: " . BASE_URL . "views/mantenimientos/index.php?success=1");

    } else {

        header("Location: " . BASE_URL . "views/mantenimientos/crear.php?error=1");

    }

    exit();
}

/*
|--------------------------------------------------------------------------
| Actualizar mantenimiento
|--------------------------------------------------------------------------
*/

if (isset($_POST["actualizar"])) {

    $respuesta = $modelo->actualizar(

        $_POST["id_mantenimiento"],
        $_POST["id_moto"],
        $_POST["fecha"],
        trim($_POST["descripcion"]),
        $_POST["costo"],
        $_POST["estado"]

    );

    /*
    |--------------------------------------------------------------------------
    | Validar actualización
    |--------------------------------------------------------------------------
    */

    if ($respuesta) {

        header("Location: " . BASE_URL . "views/mantenimientos/index.php?update=1");

    } else {

        header("Location: " . BASE_URL . "views/mantenimientos/editar.php?id=" . $_POST["id_mantenimiento"]);

    }

    exit();
}

/*
|--------------------------------------------------------------------------
| Eliminar mantenimiento
|--------------------------------------------------------------------------
*/

if (isset($_GET["eliminar"])) {

    $respuesta = $modelo->eliminar($_GET["eliminar"]);

    /*
    |--------------------------------------------------------------------------
    | Validar eliminación
    |--------------------------------------------------------------------------
    */

    if ($respuesta) {

        header("Location: " . BASE_URL . "views/mantenimientos/index.php?delete=1");

    } else {

        header("Location: " . BASE_URL . "views/mantenimientos/index.php?error=1");

    }

    exit();
}

?>