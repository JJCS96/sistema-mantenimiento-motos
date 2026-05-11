<?php

/*
|--------------------------------------------------------------------------
| Controlador Moto
|--------------------------------------------------------------------------
| Maneja guardar, actualizar y eliminar motos.
*/

session_start();

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/Moto.php";

// Proteger el controlador
if (!isset($_SESSION["id_usuario"])) {
    header("Location: " . BASE_URL . "views/auth/login.php");
    exit();
}

$motoModel = new Moto();

if (isset($_GET["action"])) {

    if ($_GET["action"] == "guardar") {

        // Recibir datos del formulario
        $id_cliente = $_POST["id_cliente"];
        $placa = trim($_POST["placa"]);
        $marca = trim($_POST["marca"]);
        $modelo = trim($_POST["modelo"]);
        $anio = $_POST["anio"];
        $color = trim($_POST["color"]);
        $cilindraje = trim($_POST["cilindraje"]);

        // Guardar moto
        $respuesta = $motoModel->guardar(
            $id_cliente,
            $placa,
            $marca,
            $modelo,
            $anio,
            $color,
            $cilindraje
        );

        if ($respuesta) {
            header("Location: " . BASE_URL . "views/motos/index.php?success=registrado");
        } else {
            header("Location: " . BASE_URL . "views/motos/crear.php?error=1");
        }

        exit();
    }

    if ($_GET["action"] == "actualizar") {

        // Recibir datos del formulario
        $id_moto = $_POST["id_moto"];
        $id_cliente = $_POST["id_cliente"];
        $placa = trim($_POST["placa"]);
        $marca = trim($_POST["marca"]);
        $modelo = trim($_POST["modelo"]);
        $anio = $_POST["anio"];
        $color = trim($_POST["color"]);
        $cilindraje = trim($_POST["cilindraje"]);

        // Actualizar moto
        $respuesta = $motoModel->actualizar(
            $id_moto,
            $id_cliente,
            $placa,
            $marca,
            $modelo,
            $anio,
            $color,
            $cilindraje
        );

        if ($respuesta) {
            header("Location: " . BASE_URL . "views/motos/index.php?success=actualizado");
        } else {
            header("Location: " . BASE_URL . "views/motos/editar.php?id=" . $id_moto . "&error=1");
        }

        exit();
    }

    if ($_GET["action"] == "eliminar") {

        // Recibir ID de la moto
        $id_moto = $_GET["id"];

        // Eliminar de forma lógica
        $respuesta = $motoModel->eliminar($id_moto);

        if ($respuesta) {
            header("Location: " . BASE_URL . "views/motos/index.php?success=eliminado");
        } else {
            header("Location: " . BASE_URL . "views/motos/index.php?error=1");
        }

        exit();
    }
}

?>