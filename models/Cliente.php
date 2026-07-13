<?php

/*
|--------------------------------------------------------------------------
| Modelo Cliente
|--------------------------------------------------------------------------
| Maneja todas las consultas relacionadas con clientes.
*/

require_once __DIR__ . "/../config/conexion.php";

class Cliente {

    private $conexion;

    /*
    |--------------------------------------------------------------------------
    | Constructor
    |--------------------------------------------------------------------------
    */

    public function __construct() {

        $database = new Conexion();

        $this->conexion = $database->conectar();
    }

    /*
    |--------------------------------------------------------------------------
    | Obtener todos los clientes
    |--------------------------------------------------------------------------
    */

    public function obtenerTodos() {

        $sql = "SELECT * FROM clientes ORDER BY id_cliente DESC";

        $resultado = $this->conexion->query($sql);

        $clientes = [];

        while ($fila = $resultado->fetch_assoc()) {

            $clientes[] = $fila;
        }

        return $clientes;
    }

    /*
    |--------------------------------------------------------------------------
    | Registrar cliente
    |--------------------------------------------------------------------------
    */

    public function registrar(
    $cedula,
    $nombres,
    $apellidos,
    $telefono,
    $correo,
    $direccion
) {

    /*
    |--------------------------------------------------------------------------
    | Consulta SQL
    |--------------------------------------------------------------------------
    */

    $sql = "INSERT INTO clientes(

                cedula,
                nombres,
                apellidos,
                telefono,
                correo,
                direccion

            )

            VALUES (?, ?, ?, ?, ?, ?)";

    /*
    |--------------------------------------------------------------------------
    | Preparar consulta
    |--------------------------------------------------------------------------
    */

    $stmt = $this->conexion->prepare($sql);

    /*
    |--------------------------------------------------------------------------
    | Vincular parámetros
    |--------------------------------------------------------------------------
    */

    $stmt->bind_param(

        "ssssss",

        $cedula,
        $nombres,
        $apellidos,
        $telefono,
        $correo,
        $direccion

    );

    /*
    |--------------------------------------------------------------------------
    | Ejecutar consulta
    |--------------------------------------------------------------------------
    */

    return $stmt->execute();
}

    /*
    |--------------------------------------------------------------------------
    | Verificar si existe una cédula
    |--------------------------------------------------------------------------
    | Se usa antes de registrar o actualizar para evitar duplicados.
    | Si se envía un ID, se excluye ese registro para permitir la edición.
    */

    public function existeCedula($cedula, $excluirId = null) {

        $sql = "SELECT id_cliente FROM clientes WHERE cedula = ?";

        if ($excluirId !== null) {
            $sql .= " AND id_cliente <> ?";
        }

        $stmt = $this->conexion->prepare($sql);

        if ($excluirId !== null) {
            $stmt->bind_param("si", $cedula, $excluirId);
        } else {
            $stmt->bind_param("s", $cedula);
        }

        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->num_rows > 0;
    }


    /*
    |--------------------------------------------------------------------------
    | Buscar cliente por ID
    |--------------------------------------------------------------------------
    */

    public function obtenerPorId($id) {

        $sql = "SELECT * FROM clientes WHERE id_cliente = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $resultado = $stmt->get_result();

        return $resultado->fetch_assoc();
    }

    /*
    |--------------------------------------------------------------------------
    | Actualizar cliente
    |--------------------------------------------------------------------------
    */

public function actualizar($id, $cedula, $nombres, $apellidos, $telefono, $correo, $direccion) {

    $sql = "UPDATE clientes
            SET cedula = ?,
                nombres = ?,
                apellidos = ?,
                telefono = ?,
                correo = ?,
                direccion = ?
            WHERE id_cliente = ?";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bind_param(
        "ssssssi",
        $cedula,
        $nombres,
        $apellidos,
        $telefono,
        $correo,
        $direccion,
        $id
    );

    return $stmt->execute();
}

    /*
    |--------------------------------------------------------------------------
    | Eliminar cliente
    |--------------------------------------------------------------------------
    */

    public function eliminar($id) {

        // Si el cliente tiene motos asociadas, se evita eliminarlo para no romper la relación.
        if ($this->tieneMotos($id)) {
            return false;
        }

        $sql = "DELETE FROM clientes WHERE id_cliente = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | Verificar si el cliente tiene motos asociadas
    |--------------------------------------------------------------------------
    */

    public function tieneMotos($id) {

        $sql = "SELECT COUNT(*) AS total FROM motos WHERE id_cliente = ?";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();

        return ($fila["total"] ?? 0) > 0;
    }


    /*
|--------------------------------------------------------------------------
| Contar clientes
|--------------------------------------------------------------------------
*/

public function contarClientes() {

    $sql = "SELECT COUNT(*) AS total FROM clientes";

    $resultado = $this->conexion->query($sql);

    $fila = $resultado->fetch_assoc();

    return $fila["total"];
}



}


