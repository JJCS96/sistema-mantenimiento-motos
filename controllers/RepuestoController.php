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

$modelo = new Repuesto();

/*
|--------------------------------------------------------------------------
| Registrar repuesto
|--------------------------------------------------------------------------
*/

if (isset($_POST["registrar"])) {

    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");
    $stock = trim($_POST["stock"] ?? "");
    $precio = trim($_POST["precio"] ?? "");

    if ($nombre === "" || !$modelo->esInventarioValido($stock, $precio)) {
        header("Location: " . BASE_URL . "views/repuestos/crear.php?error=1");
        exit();
    }

    $respuesta = $modelo->registrar(
        $nombre,
        $descripcion,
        $stock,
        $precio
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

    $id = (int) ($_POST["id_repuesto"] ?? 0);
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");
    $stock = trim($_POST["stock"] ?? "");
    $precio = trim($_POST["precio"] ?? "");

    if ($id <= 0 || $nombre === "" || !$modelo->esInventarioValido($stock, $precio)) {
        header("Location: " . BASE_URL . "views/repuestos/editar.php?id=" . $id . "&error=1");
        exit();
    }

    $respuesta = $modelo->actualizar(
        $id,
        $nombre,
        $descripcion,
        $stock,
        $precio
    );

    if ($respuesta) {
        header("Location: " . BASE_URL . "views/repuestos/index.php?update=1");
    } else {
        header("Location: " . BASE_URL . "views/repuestos/editar.php?id=" . $id . "&error=1");
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
