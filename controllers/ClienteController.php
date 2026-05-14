<?php

/*
|--------------------------------------------------------------------------
| Controlador de Clientes
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../models/Cliente.php";
require_once __DIR__ . "/../config/config.php";

$modelo = new Cliente();

/*
|--------------------------------------------------------------------------
| Registrar cliente
|--------------------------------------------------------------------------
*/

if (isset($_POST["registrar"])) {

$modelo->registrar(

    $_POST["cedula"],
    $_POST["nombres"],
    $_POST["apellidos"],
    $_POST["telefono"],
    $_POST["correo"],
    $_POST["direccion"]

);

    header("Location: " . BASE_URL . "views/clientes/index.php?success=1");
}

/*
|--------------------------------------------------------------------------
| Actualizar cliente
|--------------------------------------------------------------------------
*/

if (isset($_POST["actualizar"])) {

$modelo->actualizar(

    $_POST["id_cliente"],
    $_POST["cedula"],
    $_POST["nombres"],
    $_POST["apellidos"],
    $_POST["telefono"],
    $_POST["correo"],
    $_POST["direccion"]

);

    header("Location: " . BASE_URL . "views/clientes/index.php?update=1");
}

/*
|--------------------------------------------------------------------------
| Eliminar cliente
|--------------------------------------------------------------------------
*/

if (isset($_GET["eliminar"])) {

    $modelo->eliminar($_GET["eliminar"]);

    header("Location: " . BASE_URL . "views/clientes/index.php?delete=1");
}