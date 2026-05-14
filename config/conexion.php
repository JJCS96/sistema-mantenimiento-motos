<?php

/*
|--------------------------------------------------------------------------
| Clase de conexión a la base de datos
|--------------------------------------------------------------------------
| Esta clase permite conectar PHP con MySQL usando mysqli.
| Se reutiliza en todos los modelos del sistema.
*/

class Conexion
{
    private $host = "localhost";
    private $usuario = "root";
    private $password = "1234";
    private $base_datos = "sistema_motos";

    public function conectar()
    {
        // Crear conexión con MySQL
        $conexion = new mysqli(
            $this->host,
            $this->usuario,
            $this->password,
            $this->base_datos
        );

        // Validar si ocurrió un error de conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Configurar caracteres para permitir tildes y ñ
        $conexion->set_charset("utf8");

        return $conexion;
    }
}

?>