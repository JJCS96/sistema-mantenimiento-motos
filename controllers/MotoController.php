<?php

/*
|--------------------------------------------------------------------------
| Controlador Moto
|--------------------------------------------------------------------------
| Maneja:
| - Registrar motos
| - Actualizar motos
| - Eliminar motos
|--------------------------------------------------------------------------
*/

session_start();

/*
|--------------------------------------------------------------------------
| Importar archivos necesarios
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/Moto.php";
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

$modelo = new Moto();

/*
|--------------------------------------------------------------------------
| Registrar moto
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Registrar moto
|--------------------------------------------------------------------------
*/

if (isset($_POST["registrar"])) {

    $idCliente = (int) ($_POST["id_cliente"] ?? 0);
    $placa = trim($_POST["placa"] ?? "");
    $marca = trim($_POST["marca"] ?? "");
    $modeloMoto = trim($_POST["modelo"] ?? "");
    $color = trim($_POST["color"] ?? "");
    $anio = trim($_POST["anio"] ?? "");
    $cilindraje = trim($_POST["cilindraje"] ?? "");

    if ($idCliente <= 0 || $placa === "" || $marca === "" || $modeloMoto === "") {
        header("Location: " . BASE_URL . "views/motos/crear.php?error=1");
        exit();
    }

    /*
    |--------------------------------------------------------------------------
    | Validar placa repetida
    |--------------------------------------------------------------------------
    */

    if ($modelo->existePlaca($placa)) {

        header("Location: " . BASE_URL . "views/motos/crear.php?placa=duplicada");

        exit();
    }

    /*
    |--------------------------------------------------------------------------
    | Registrar moto
    |--------------------------------------------------------------------------
    */

    $respuesta = $modelo->registrar(

        $idCliente,
        $placa,
        $marca,
        $modeloMoto,
        $color,
        $anio,
        $cilindraje

    );

    /*
    |--------------------------------------------------------------------------
    | Validar respuesta
    |--------------------------------------------------------------------------
    */

    if ($respuesta) {

        header("Location: " . BASE_URL . "views/motos/index.php?success=1");

    } else {

        header("Location: " . BASE_URL . "views/motos/crear.php?error=1");

    }

    exit();
}





/*
|--------------------------------------------------------------------------
| Actualizar moto
|--------------------------------------------------------------------------
*/

if (isset($_POST["actualizar"])) {

    $idMoto = (int) ($_POST["id_moto"] ?? 0);
    $idCliente = (int) ($_POST["id_cliente"] ?? 0);
    $placa = trim($_POST["placa"] ?? "");
    $marca = trim($_POST["marca"] ?? "");
    $modeloMoto = trim($_POST["modelo"] ?? "");
    $color = trim($_POST["color"] ?? "");
    $anio = trim($_POST["anio"] ?? "");
    $cilindraje = trim($_POST["cilindraje"] ?? "");

    if ($idMoto <= 0 || $idCliente <= 0 || $placa === "" || $marca === "" || $modeloMoto === "") {
        header("Location: " . BASE_URL . "views/motos/editar.php?id=" . $idMoto . "&error=1");
        exit();
    }

    if ($modelo->existePlaca($placa, $idMoto)) {
        header("Location: " . BASE_URL . "views/motos/editar.php?id=" . $idMoto . "&placa=duplicada");
        exit();
    }

    $respuesta = $modelo->actualizar(

        $idMoto,
        $idCliente,
        $placa,
        $marca,
        $modeloMoto,
        $color,
        $anio,
        $cilindraje

    );

    /*
    |--------------------------------------------------------------------------
    | Validar actualización
    |--------------------------------------------------------------------------
    */

    if ($respuesta) {

        header("Location: " . BASE_URL . "views/motos/index.php?update=1");

    } else {

        header("Location: " . BASE_URL . "views/motos/editar.php?id=" . $idMoto . "&error=1");

    }

    exit();
}

/*
|--------------------------------------------------------------------------
| Eliminar moto
|--------------------------------------------------------------------------
*/

if (isset($_GET["eliminar"])) {

    $id = (int) $_GET["eliminar"];

    if ($modelo->tieneMantenimientos($id)) {
        header("Location: " . BASE_URL . "views/motos/index.php?dependencia=1");
        exit();
    }

    $respuesta = $modelo->eliminar($id);

    /*
    |--------------------------------------------------------------------------
    | Validar eliminación
    |--------------------------------------------------------------------------
    */

    if ($respuesta) {

        header("Location: " . BASE_URL . "views/motos/index.php?delete=1");

    } else {

        header("Location: " . BASE_URL . "views/motos/index.php?error=1");

    }

    exit();
}

?>
