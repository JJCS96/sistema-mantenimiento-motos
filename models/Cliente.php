<?php

/*
|--------------------------------------------------------------------------
| Modelo Cliente
|--------------------------------------------------------------------------
| Contiene las consultas SQL del módulo clientes.
*/

require_once __DIR__ . "/../config/conexion.php";

class Cliente
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function listar()
    {
        // Listar clientes activos
        $sql = "SELECT * FROM clientes 
                WHERE estado = 1 
                ORDER BY id_cliente DESC";

        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id_cliente)
    {
        // Obtener cliente por ID
        $sql = "SELECT * FROM clientes 
                WHERE id_cliente = ? 
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function guardar($cedula, $nombres, $apellidos, $telefono, $correo, $direccion)
    {
        // Insertar nuevo cliente
        $sql = "INSERT INTO clientes 
                (cedula, nombres, apellidos, telefono, correo, direccion)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param(
            "ssssss",
            $cedula,
            $nombres,
            $apellidos,
            $telefono,
            $correo,
            $direccion
        );

        return $stmt->execute();
    }

    public function actualizar($id_cliente, $cedula, $nombres, $apellidos, $telefono, $correo, $direccion)
    {
        // Actualizar cliente existente
        $sql = "UPDATE clientes SET
                cedula = ?,
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
            $id_cliente
        );

        return $stmt->execute();
    }

    public function eliminar($id_cliente)
    {
        // Eliminación lógica
        $sql = "UPDATE clientes SET estado = 0 
                WHERE id_cliente = ?";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id_cliente);

        return $stmt->execute();
    }
}

?>