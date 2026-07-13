<?php

/*
|--------------------------------------------------------------------------
| Controlador de Clientes
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../models/Cliente.php";
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../includes/validar_sesion.php";

$modelo = new Cliente();

/*
|--------------------------------------------------------------------------
| Registrar cliente
|--------------------------------------------------------------------------
*/

if (isset($_POST["registrar"])) {

    $cedula = trim($_POST["cedula"] ?? "");
    $nombres = trim($_POST["nombres"] ?? "");
    $apellidos = trim($_POST["apellidos"] ?? "");
    $telefono = trim($_POST["telefono"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $direccion = trim($_POST["direccion"] ?? "");

    if ($cedula === "" || $nombres === "" || $apellidos === "") {
        header("Location: " . BASE_URL . "views/clientes/crear.php?error=1");
        exit();
    }

    if ($modelo->existeCedula($cedula)) {
        header("Location: " . BASE_URL . "views/clientes/crear.php?cedula=duplicada");
        exit();
    }


$resultado = $modelo->registrar(

    $cedula,
    $nombres,
    $apellidos,
    $telefono,
    $correo,
    $direccion

);

    if ($resultado) {
        header("Location: " . BASE_URL . "views/clientes/index.php?success=1");
    } else {
        header("Location: " . BASE_URL . "views/clientes/crear.php?error=1");
    }

    exit();
}

/*
|--------------------------------------------------------------------------
| Actualizar cliente
|--------------------------------------------------------------------------
*/

if (isset($_POST["actualizar"])) {

    $id = (int) ($_POST["id_cliente"] ?? 0);
    $cedula = trim($_POST["cedula"] ?? "");
    $nombres = trim($_POST["nombres"] ?? "");
    $apellidos = trim($_POST["apellidos"] ?? "");
    $telefono = trim($_POST["telefono"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $direccion = trim($_POST["direccion"] ?? "");

    if ($id <= 0 || $cedula === "" || $nombres === "" || $apellidos === "") {
        header("Location: " . BASE_URL . "views/clientes/editar.php?id=" . $id . "&error=1");
        exit();
    }

    if ($modelo->existeCedula($cedula, $id)) {
        header("Location: " . BASE_URL . "views/clientes/editar.php?id=" . $id . "&cedula=duplicada");
        exit();
    }


$resultado = $modelo->actualizar(

    $id,
    $cedula,
    $nombres,
    $apellidos,
    $telefono,
    $correo,
    $direccion

);

    if ($resultado) {
        header("Location: " . BASE_URL . "views/clientes/index.php?update=1");
    } else {
        header("Location: " . BASE_URL . "views/clientes/editar.php?id=" . $id . "&error=1");
    }

    exit();
}

/*
|--------------------------------------------------------------------------
| Eliminar cliente
|--------------------------------------------------------------------------
*/

if (isset($_GET["eliminar"])) {

    $id = (int) $_GET["eliminar"];
    $resultado = $modelo->eliminar($id);

    if ($resultado) {
        header("Location: " . BASE_URL . "views/clientes/index.php?delete=1");
    } else {
        header("Location: " . BASE_URL . "views/clientes/index.php?dependencia=1");
    }

    exit();
}
