<?php

/*
|--------------------------------------------------------------------------
| Modelo Mantenimiento
|--------------------------------------------------------------------------
| Maneja todas las operaciones de la tabla mantenimientos.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Importar conexión
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../config/conexion.php";

/*
|--------------------------------------------------------------------------
| Clase Mantenimiento
|--------------------------------------------------------------------------
*/

class Mantenimiento {

    /*
    |--------------------------------------------------------------------------
    | Variable conexión
    |--------------------------------------------------------------------------
    */

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
    | Obtener todos los mantenimientos
    |--------------------------------------------------------------------------
    */

    public function obtenerTodos() {

        $sql = "SELECT mantenimientos.*,

                       motos.placa,
                       motos.marca,
                       motos.modelo,

                       clientes.nombres,
                       clientes.apellidos

                FROM mantenimientos

                INNER JOIN motos
                ON mantenimientos.id_moto = motos.id_moto

                INNER JOIN clientes
                ON motos.id_cliente = clientes.id_cliente

                ORDER BY mantenimientos.id_mantenimiento DESC";

        $resultado = $this->conexion->query($sql);

        $mantenimientos = [];

        while ($fila = $resultado->fetch_assoc()) {

            $mantenimientos[] = $fila;
        }

        return $mantenimientos;
    }

    /*
    |--------------------------------------------------------------------------
    | Registrar mantenimiento
    |--------------------------------------------------------------------------
    */

    public function registrar(
        $id_moto,
        $fecha,
        $descripcion,
        $costo,
        $estado
    ) {

        $sql = "INSERT INTO mantenimientos(

                    id_moto,
                    fecha,
                    descripcion,
                    costo,
                    estado

                )

                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param(

            "issds",

            $id_moto,
            $fecha,
            $descripcion,
            $costo,
            $estado

        );

        return $stmt->execute();
    }

/*
|--------------------------------------------------------------------------
| Obtener mantenimiento por ID
|--------------------------------------------------------------------------
*/

public function obtenerPorId($id) {

    $sql = "SELECT * FROM mantenimientos
            WHERE id_mantenimiento = ?";

    /*
    |--------------------------------------------------------------------------
    | Preparar consulta
    |--------------------------------------------------------------------------
    */

    $stmt = $this->conexion->prepare($sql);

    /*
    |--------------------------------------------------------------------------
    | Bind del parámetro
    |--------------------------------------------------------------------------
    */

    $stmt->bind_param("i", $id);

    /*
    |--------------------------------------------------------------------------
    | Ejecutar consulta
    |--------------------------------------------------------------------------
    */

    $stmt->execute();

    /*
    |--------------------------------------------------------------------------
    | Obtener resultado
    |--------------------------------------------------------------------------
    */

    $resultado = $stmt->get_result();

    /*
    |--------------------------------------------------------------------------
    | Retornar fila
    |--------------------------------------------------------------------------
    */

    return $resultado->fetch_assoc();
}

    /*
    |--------------------------------------------------------------------------
    | Actualizar mantenimiento
    |--------------------------------------------------------------------------
    */

    public function actualizar(
        $id,
        $id_moto,
        $fecha,
        $descripcion,
        $costo,
        $estado
    ) {

        $sql = "UPDATE mantenimientos

                SET

                    id_moto = ?,
                    fecha = ?,
                    descripcion = ?,
                    costo = ?,
                    estado = ?

                WHERE id_mantenimiento = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param(

            "issdsi",

            $id_moto,
            $fecha,
            $descripcion,
            $costo,
            $estado,
            $id

        );

        return $stmt->execute();
    }

    /*
    |--------------------------------------------------------------------------
    | Eliminar mantenimiento
    |--------------------------------------------------------------------------
    */

    public function eliminar($id) {

        $sql = "DELETE FROM mantenimientos
                WHERE id_mantenimiento = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }



    /*
|--------------------------------------------------------------------------
| Contar mantenimientos
|--------------------------------------------------------------------------
*/

public function contarMantenimientos() {

    $sql = "SELECT COUNT(*) AS total FROM mantenimientos";

    $resultado = $this->conexion->query($sql);

    $fila = $resultado->fetch_assoc();

    return $fila["total"];
}



/*
|--------------------------------------------------------------------------
| Contar mantenimientos por estado
|--------------------------------------------------------------------------
| Permite obtener el total de mantenimientos pendientes o finalizados.
|--------------------------------------------------------------------------
*/

public function contarPorEstado($estado) {

    $sql = "SELECT COUNT(*) AS total
            FROM mantenimientos
            WHERE estado = ?";

    $stmt = $this->conexion->prepare($sql);
    $stmt->bind_param("s", $estado);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();

    return $fila["total"] ?? 0;
}

/*
|--------------------------------------------------------------------------
| Sumar costo total de mantenimientos
|--------------------------------------------------------------------------
| Calcula el valor total registrado en los mantenimientos.
|--------------------------------------------------------------------------
*/

public function sumarCostos() {

    $sql = "SELECT COALESCE(SUM(costo), 0) AS total
            FROM mantenimientos";

    $resultado = $this->conexion->query($sql);
    $fila = $resultado->fetch_assoc();

    return $fila["total"] ?? 0;
}


/*
|--------------------------------------------------------------------------
| Obtener últimos mantenimientos
|--------------------------------------------------------------------------
*/

public function obtenerUltimos() {

    $sql = "SELECT mantenimientos.*,
                   motos.placa,
                   motos.marca,
                   motos.modelo,
                   clientes.nombres,
                   clientes.apellidos
            FROM mantenimientos
            INNER JOIN motos
            ON mantenimientos.id_moto = motos.id_moto
            INNER JOIN clientes
            ON motos.id_cliente = clientes.id_cliente
            ORDER BY mantenimientos.id_mantenimiento DESC
            LIMIT 5";

    $resultado = $this->conexion->query($sql);

    $mantenimientos = [];

    while ($fila = $resultado->fetch_assoc()) {
        $mantenimientos[] = $fila;
    }

    return $mantenimientos;
}




}

?>