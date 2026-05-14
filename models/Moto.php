<?php

/*
|--------------------------------------------------------------------------
| Modelo Moto
|--------------------------------------------------------------------------
*/

require_once __DIR__ . "/../config/conexion.php";

class Moto {

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
    | Obtener todas las motos
    |--------------------------------------------------------------------------
    */

    public function obtenerTodas() {

        $sql = "SELECT motos.*,

                       clientes.nombres,
                       clientes.apellidos

                FROM motos

                INNER JOIN clientes
                ON motos.id_cliente = clientes.id_cliente

                ORDER BY motos.id_moto DESC";

        $resultado = $this->conexion->query($sql);

        $motos = [];

        while ($fila = $resultado->fetch_assoc()) {

            $motos[] = $fila;
        }

        return $motos;
    }

    /*
    |--------------------------------------------------------------------------
    | Registrar moto
    |--------------------------------------------------------------------------
    */

/*
|--------------------------------------------------------------------------
| Registrar moto
|--------------------------------------------------------------------------
| Inserta una nueva moto en la base de datos.
|--------------------------------------------------------------------------
*/

public function registrar(

    $id_cliente,
    $placa,
    $marca,
    $modelo,
    $color,
    $anio,
    $cilindraje

) {

    /*
    |--------------------------------------------------------------------------
    | Consulta SQL
    |--------------------------------------------------------------------------
    */

    $sql = "INSERT INTO motos(

                id_cliente,
                placa,
                marca,
                modelo,
                color,
                anio,
                cilindraje

            )

            VALUES (?, ?, ?, ?, ?, ?, ?)";

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

        "issssss",

        $id_cliente,
        $placa,
        $marca,
        $modelo,
        $color,
        $anio,
        $cilindraje

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
| Obtener moto por ID
|--------------------------------------------------------------------------
*/

public function obtenerPorId($id) {

    $sql = "SELECT * FROM motos WHERE id_moto = ?";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    $resultado = $stmt->get_result();

    return $resultado->fetch_assoc();
}

/*
|--------------------------------------------------------------------------
| Actualizar moto
|--------------------------------------------------------------------------
| Actualiza los datos de una moto existente.
|--------------------------------------------------------------------------
*/

public function actualizar(

    $id,
    $id_cliente,
    $placa,
    $marca,
    $modelo,
    $color,
    $anio,
    $cilindraje

) {

    /*
    |--------------------------------------------------------------------------
    | Consulta SQL
    |--------------------------------------------------------------------------
    */

    $sql = "UPDATE motos

            SET

                id_cliente = ?,
                placa = ?,
                marca = ?,
                modelo = ?,
                color = ?,
                anio = ?,
                cilindraje = ?

            WHERE id_moto = ?";

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

        "issssssi",

        $id_cliente,
        $placa,
        $marca,
        $modelo,
        $color,
        $anio,
        $cilindraje,
        $id

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
| Eliminar moto
|--------------------------------------------------------------------------
*/

public function eliminar($id) {

    $sql = "DELETE FROM motos WHERE id_moto = ?";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bind_param("i", $id);

    return $stmt->execute();
}



/*
|--------------------------------------------------------------------------
| Verificar si la placa existe
|--------------------------------------------------------------------------
*/

public function existePlaca($placa) {

    $sql = "SELECT id_moto FROM motos WHERE placa = ?";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bind_param("s", $placa);

    $stmt->execute();

    $resultado = $stmt->get_result();

    return $resultado->num_rows > 0;
}


/*
|--------------------------------------------------------------------------
| Contar motos
|--------------------------------------------------------------------------
*/

public function contarMotos() {

    $sql = "SELECT COUNT(*) AS total FROM motos";

    $resultado = $this->conexion->query($sql);

    $fila = $resultado->fetch_assoc();

    return $fila["total"];
}



}



