<?php

/*
|--------------------------------------------------------------------------
| Controlador Cliente
|--------------------------------------------------------------------------
| Maneja las acciones: guardar, actualizar y eliminar.
*/

session_start();

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/Cliente.php";

// Proteger el controlador
if (!isset($_SESSION["id_usuario"])) {
    header("Location: " . BASE_URL . "views/auth/login.php");
    exit();
}

$clienteModel = new Cliente();

if (isset($_GET["action"])) {

    if ($_GET["action"] == "guardar") {

        // Recibir datos del formulario
        $cedula = trim($_POST["cedula"]);
        $nombres = trim($_POST["nombres"]);
        $apellidos = trim($_POST["apellidos"]);
        $telefono = trim($_POST["telefono"]);
        $correo = trim($_POST["correo"]);
        $direccion = trim($_POST["direccion"]);

        // Guardar cliente
        $respuesta = $clienteModel->guardar(
            $cedula,
            $nombres,
            $apellidos,
            $telefono,
            $correo,
            $direccion
        );

        if ($respuesta) {
            header("Location: " . BASE_URL . "views/clientes/index.php?success=registrado");
        } else {
            header("Location: " . BASE_URL . "views/clientes/crear.php?error=1");
        }

        exit();
    }

    if ($_GET["action"] == "actualizar") {

        // Recibir datos del formulario
        $id_cliente = $_POST["id_cliente"];
        $cedula = trim($_POST["cedula"]);
        $nombres = trim($_POST["nombres"]);
        $apellidos = trim($_POST["apellidos"]);
        $telefono = trim($_POST["telefono"]);
        $correo = trim($_POST["correo"]);
        $direccion = trim($_POST["direccion"]);

        // Actualizar cliente
        $respuesta = $clienteModel->actualizar(
            $id_cliente,
            $cedula,
            $nombres,
            $apellidos,
            $telefono,
            $correo,
            $direccion
        );

        if ($respuesta) {
            header("Location: " . BASE_URL . "views/clientes/index.php?success=actualizado");
        } else {
            header("Location: " . BASE_URL . "views/clientes/editar.php?id=" . $id_cliente . "&error=1");
        }

        exit();
    }

    if ($_GET["action"] == "eliminar") {

        // Recibir ID desde la URL
        $id_cliente = $_GET["id"];

        // Eliminar de forma lógica
        $respuesta = $clienteModel->eliminar($id_cliente);

        if ($respuesta) {
            header("Location: " . BASE_URL . "views/clientes/index.php?success=eliminado");
        } else {
            header("Location: " . BASE_URL . "views/clientes/index.php?error=1");
        }

        exit();
    }
}

?>