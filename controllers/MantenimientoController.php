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
require_once __DIR__ . "/../includes/validar_sesion.php";

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

    $idMoto = (int) ($_POST["id_moto"] ?? 0);
    $fecha = trim($_POST["fecha"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");
    $costo = trim($_POST["costo"] ?? "");
    $estado = trim($_POST["estado"] ?? "");

    if ($idMoto <= 0 || $fecha === "" || $descripcion === "" || $costo === "" || $estado === "") {
        header("Location: " . BASE_URL . "views/mantenimientos/crear.php?error=1");
        exit();
    }

    $respuesta = $modelo->registrar(

        $idMoto,
        $fecha,
        $descripcion,
        $costo,
        $estado

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

    $idMantenimiento = (int) ($_POST["id_mantenimiento"] ?? 0);
    $idMoto = (int) ($_POST["id_moto"] ?? 0);
    $fecha = trim($_POST["fecha"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");
    $costo = trim($_POST["costo"] ?? "");
    $estado = trim($_POST["estado"] ?? "");

    if ($idMantenimiento <= 0 || $idMoto <= 0 || $fecha === "" || $descripcion === "" || $costo === "" || $estado === "") {
        header("Location: " . BASE_URL . "views/mantenimientos/editar.php?id=" . $idMantenimiento . "&error=1");
        exit();
    }

    $respuesta = $modelo->actualizar(

        $idMantenimiento,
        $idMoto,
        $fecha,
        $descripcion,
        $costo,
        $estado

    );

    /*
    |--------------------------------------------------------------------------
    | Validar actualización
    |--------------------------------------------------------------------------
    */

    if ($respuesta) {

        header("Location: " . BASE_URL . "views/mantenimientos/index.php?update=1");

    } else {

        header("Location: " . BASE_URL . "views/mantenimientos/editar.php?id=" . $idMantenimiento . "&error=1");

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
