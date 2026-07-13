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
    private $puerto = 3306;
    private $usuario = "root";
    // En XAMPP local normalmente el usuario root no usa contraseña.
    private $password = "1234";
    private $base_datos = "sistema_motos";

    public function conectar()
    {
        try {
            // Crear conexión con MySQL.
            $conexion = new mysqli(
                $this->host,
                $this->usuario,
                $this->password,
                $this->base_datos,
                $this->puerto
            );

            // Validar si ocurrió un error de conexión.
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Configurar caracteres para permitir tildes y ñ.
            $conexion->set_charset("utf8");

            return $conexion;
        } catch (mysqli_sql_exception $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
}

?>
