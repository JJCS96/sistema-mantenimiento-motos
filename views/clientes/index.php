<?php

/*
|--------------------------------------------------------------------------
| Vista principal de Clientes
|--------------------------------------------------------------------------
| Esta vista muestra el listado de clientes registrados
| en el sistema.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Importar modelo Cliente
|--------------------------------------------------------------------------
*/

require_once "../../models/Cliente.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelo
|--------------------------------------------------------------------------
*/

$modelo = new Cliente();

/*
|--------------------------------------------------------------------------
| Obtener todos los clientes
|--------------------------------------------------------------------------
*/

$clientes = $modelo->obtenerTodos();

/*
|--------------------------------------------------------------------------
| Título de la página
|--------------------------------------------------------------------------
*/

$titulo = "Clientes";

/*
|--------------------------------------------------------------------------
| Iniciar buffer de salida
|--------------------------------------------------------------------------
*/

ob_start();

?>

<!-- 
|--------------------------------------------------------------------------
| Encabezado de la página
|--------------------------------------------------------------------------
-->

<div class="d-flex justify-content-between align-items-center mb-4">

    <!-- Título -->
    <h2>

        <i class="bi bi-people-fill"></i>

        Clientes

    </h2>

    <!-- Botón nuevo cliente -->
    <a href="crear.php" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Nuevo Cliente

    </a>

</div>

<!-- 
|--------------------------------------------------------------------------
| Tarjeta principal
|--------------------------------------------------------------------------
-->

<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <!-- 
        |--------------------------------------------------------------------------
        | Tabla responsive
        |--------------------------------------------------------------------------
        -->

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <!-- Encabezado -->
                <thead class="table">

                    <tr>

                        <th>ID</th>

                        <th>Cédula</th>

                        <th>Nombres</th>

                        <th>Apellidos</th>

                        <th>Teléfono</th>

                        <th>Correo</th>

                        <th>Acciones</th>

                    </tr>

                </thead>

                <!-- Cuerpo -->
                <tbody>

                    <!-- 
                    |--------------------------------------------------------------------------
                    | Recorrer clientes
                    |--------------------------------------------------------------------------
                    -->

                    <?php foreach ($clientes as $cliente): ?>

                        <tr>

                            <!-- ID -->
                            <td>

                                <?php echo $cliente["id_cliente"]; ?>

                            </td>

                            <td>

                                <?php echo $cliente["cedula"]; ?>

                            </td>

                            <!-- Nombres -->
                            <td>

                                <?php echo $cliente["nombres"]; ?>

                            </td>

                            <!-- Apellidos -->
                            <td>

                                <?php echo $cliente["apellidos"]; ?>

                            </td>

                            <!-- Teléfono -->
                            <td>

                                <?php echo $cliente["telefono"]; ?>

                            </td>

                            <!-- Correo -->
                            <td>

                                <?php echo $cliente["correo"]; ?>

                            </td>

                            <!-- Acciones -->
                            <td>

                                <!-- Editar -->
                                <a 
                                    href="editar.php?id=<?php echo $cliente['id_cliente']; ?>"
                                    class="btn btn-warning btn-sm"
                                >

                                    <i class="bi bi-pencil-square"></i>

                                    Editar

                                </a>

                                <!-- Eliminar -->
                                <button 
                                    class="btn btn-danger btn-sm btn-eliminar"
                                    data-id="<?php echo $cliente['id_cliente']; ?>"
                                >

                                    <i class="bi bi-trash-fill"></i>

                                    Eliminar

                                </button>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php

/*
|--------------------------------------------------------------------------
| Alertas SweetAlert
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Cliente registrado correctamente
|--------------------------------------------------------------------------
*/

if (isset($_GET["success"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'success',
            title: 'Cliente registrado',
            text: 'El cliente fue registrado correctamente',
            timer: 2000,
            showConfirmButton: false

        });

    </script>

    ";
}

/*
|--------------------------------------------------------------------------
| Cliente actualizado correctamente
|--------------------------------------------------------------------------
*/

if (isset($_GET["update"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'success',
            title: 'Cliente actualizado',
            text: 'Los datos fueron actualizados correctamente',
            timer: 2000,
            showConfirmButton: false

        });

    </script>

    ";
}

/*
|--------------------------------------------------------------------------
| Cliente eliminado correctamente
|--------------------------------------------------------------------------
*/

if (isset($_GET["delete"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'success',
            title: 'Cliente eliminado',
            text: 'El cliente fue eliminado correctamente',
            timer: 2000,
            showConfirmButton: false

        });

    </script>

    ";
}

/*
|--------------------------------------------------------------------------
| Guardar contenido generado
|--------------------------------------------------------------------------
*/

$contenido = ob_get_clean();

/*
|--------------------------------------------------------------------------
| Cargar layout principal
|--------------------------------------------------------------------------
*/

include "../layouts/app.php";

?>