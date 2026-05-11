<?php

/*
|--------------------------------------------------------------------------
| Modelo Moto
|--------------------------------------------------------------------------
| Contiene las consultas SQL relacionadas con motos.
*/

require_once __DIR__ . "/../config/conexion.php";

class Moto
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function listar()
    {
        // Listar motos activas con su cliente propietario
        $sql = "SELECT motos.*, clientes.nombres, clientes.apellidos
                FROM motos
                INNER JOIN clientes ON motos.id_cliente = clientes.id_cliente
                WHERE motos.estado = 1
                ORDER BY motos.id_moto DESC";

        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id_moto)
    {
        // Obtener moto por ID
        $sql = "SELECT * FROM motos 
                WHERE id_moto = ? 
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id_moto);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function guardar($id_cliente, $placa, $marca, $modelo, $anio, $color, $cilindraje)
    {
        // Insertar nueva moto
        $sql = "INSERT INTO motos
                (id_cliente, placa, marca, modelo, anio, color, cilindraje)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param(
            "isssiss",
            $id_cliente,
            $placa,
            $marca,
            $modelo,
            $anio,
            $color,
            $cilindraje
        );

        return $stmt->execute();
    }

    public function actualizar($id_moto, $id_cliente, $placa, $marca, $modelo, $anio, $color, $cilindraje)
    {
        // Actualizar moto existente
        $sql = "UPDATE motos SET
                id_cliente = ?,
                placa = ?,
                marca = ?,
                modelo = ?,
                anio = ?,
                color = ?,
                cilindraje = ?
                WHERE id_moto = ?";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param(
            "isssissi",
            $id_cliente,
            $placa,
            $marca,
            $modelo,
            $anio,
            $color,
            $cilindraje,
            $id_moto
        );

        return $stmt->execute();
    }

    public function eliminar($id_moto)
    {
        // Eliminación lógica
        $sql = "UPDATE motos SET estado = 0 
                WHERE id_moto = ?";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id_moto);

        return $stmt->execute();
    }
}

?>