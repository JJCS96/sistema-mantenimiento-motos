<?php

/*
|--------------------------------------------------------------------------
| Modelo Repuesto
|--------------------------------------------------------------------------
| Maneja las operaciones de la tabla repuestos.
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../config/conexion.php";

class Repuesto {

    private $conexion;

    public function __construct() {

        $database = new Conexion();
        $this->conexion = $database->conectar();
    }

    /*
    |--------------------------------------------------------------------------
    | Obtener todos los repuestos activos
    |--------------------------------------------------------------------------
    */

    public function obtenerTodos() {

        $sql = "SELECT * FROM repuestos 
                WHERE estado = 1
                ORDER BY id_repuesto DESC";

        $resultado = $this->conexion->query($sql);

        $repuestos = [];

        while ($fila = $resultado->fetch_assoc()) {
            $repuestos[] = $fila;
        }

        return $repuestos;
    }

    /*
    |--------------------------------------------------------------------------
    | Registrar repuesto
    |--------------------------------------------------------------------------
    */

    public function registrar($nombre, $descripcion, $stock, $precio) {

        $sql = "INSERT INTO repuestos(
                    nombre,
                    descripcion,
                    stock,
                    precio
                )
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param(
            "ssid",
            $nombre,
            $descripcion,
            $stock,
            $precio
        );

        return $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | Obtener repuesto por ID
    |--------------------------------------------------------------------------
    */

    public function obtenerPorId($id) {

        $sql = "SELECT * FROM repuestos 
                WHERE id_repuesto = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $resultado = $stmt->get_result();

        return $resultado->fetch_assoc();
    }

    /*
    |--------------------------------------------------------------------------
    | Actualizar repuesto
    |--------------------------------------------------------------------------
    */

    public function actualizar($id, $nombre, $descripcion, $stock, $precio) {

        $sql = "UPDATE repuestos
                SET nombre = ?,
                    descripcion = ?,
                    stock = ?,
                    precio = ?
                WHERE id_repuesto = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param(
            "ssidi",
            $nombre,
            $descripcion,
            $stock,
            $precio,
            $id
        );

        return $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | Eliminar repuesto
    |--------------------------------------------------------------------------
    | Eliminación lógica.
    |--------------------------------------------------------------------------
    */

    public function eliminar($id) {

        $sql = "UPDATE repuestos 
                SET estado = 0 
                WHERE id_repuesto = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | Contar repuestos activos
    |--------------------------------------------------------------------------
    */

    public function contarRepuestos() {

        $sql = "SELECT COUNT(*) AS total
                FROM repuestos
                WHERE estado = 1";

        $resultado = $this->conexion->query($sql);
        $fila = $resultado->fetch_assoc();

        return $fila["total"] ?? 0;
    }

    /*
    |--------------------------------------------------------------------------
    | Contar repuestos con bajo stock
    |--------------------------------------------------------------------------
    | Se considera bajo stock cuando la cantidad es menor o igual a 5.
    |--------------------------------------------------------------------------
    */

    public function contarBajoStock($limite = 5) {

        $sql = "SELECT COUNT(*) AS total
                FROM repuestos
                WHERE estado = 1
                AND stock <= ?";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $limite);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();

        return $fila["total"] ?? 0;
    }

    /*
    |--------------------------------------------------------------------------
    | Obtener repuestos con bajo stock
    |--------------------------------------------------------------------------
    */

    public function obtenerBajoStock($limite = 5) {

        $sql = "SELECT *
                FROM repuestos
                WHERE estado = 1
                AND stock <= ?
                ORDER BY stock ASC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $limite);
        $stmt->execute();

        $resultado = $stmt->get_result();

        $repuestos = [];

        while ($fila = $resultado->fetch_assoc()) {
            $repuestos[] = $fila;
        }

        return $repuestos;
    }

}

?>