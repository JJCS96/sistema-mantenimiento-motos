<?php

/*
|--------------------------------------------------------------------------
| Modelo Usuario
|--------------------------------------------------------------------------
| Este archivo se encarga de las consultas relacionadas con los usuarios.
| Se usa principalmente para validar el inicio de sesión.
*/

require_once __DIR__ . "/../config/conexion.php";

class Usuario
{
    private $conexion;

    public function __construct()
    {
        // Crear la conexión a la base de datos
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function buscarPorUsuario($usuario)
    {
        /*
        | Buscar un usuario activo por su nombre de usuario.
        | Se utiliza consulta preparada para mayor seguridad.
        */

        $sql = "SELECT * FROM usuarios 
                WHERE usuario = ? 
                AND estado = 1 
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        }

        return null;
    }
}

?>