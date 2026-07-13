<?php

require_once "../../includes/validar_sesion.php";

/*
|--------------------------------------------------------------------------
| Vista principal de mantenimientos
|--------------------------------------------------------------------------
| Muestra el listado de mantenimientos registrados.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Importar modelo
|--------------------------------------------------------------------------
*/

require_once "../../models/Mantenimiento.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelo
|--------------------------------------------------------------------------
*/

$modelo = new Mantenimiento();

/*
|--------------------------------------------------------------------------
| Obtener mantenimientos
|--------------------------------------------------------------------------
*/

$mantenimientos = $modelo->obtenerTodos();

/*
|--------------------------------------------------------------------------
| Título de la página
|--------------------------------------------------------------------------
*/

$titulo = "Mantenimientos";

/*
|--------------------------------------------------------------------------
| Variable alertas
|--------------------------------------------------------------------------
*/

$alerta = "";

/*
|--------------------------------------------------------------------------
| Alerta registrar
|--------------------------------------------------------------------------
*/

if (isset($_GET["success"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'success',
            title: 'Mantenimiento registrado',
            text: 'El mantenimiento fue registrado correctamente',
            timer: 2000,
            showConfirmButton: false

        });

    </script>

    ";
}

/*
|--------------------------------------------------------------------------
| Alerta actualizar
|--------------------------------------------------------------------------
*/

if (isset($_GET["update"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'success',
            title: 'Mantenimiento actualizado',
            text: 'El mantenimiento fue actualizado correctamente',
            timer: 2000,
            showConfirmButton: false

        });

    </script>

    ";
}

/*
|--------------------------------------------------------------------------
| Alerta eliminar
|--------------------------------------------------------------------------
*/

if (isset($_GET["delete"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'success',
            title: 'Mantenimiento eliminado',
            text: 'El mantenimiento fue eliminado correctamente',
            timer: 2000,
            showConfirmButton: false

        });

    </script>

    ";
}

if (isset($_GET["error"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'error',
            title: 'No se pudo guardar',
            text: 'El mantenimiento no se pudo procesar'

        });

    </script>

    ";
}

/*
|--------------------------------------------------------------------------
| Iniciar buffer
|--------------------------------------------------------------------------
*/

ob_start();

?>

<!-- Encabezado -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>

        <i class="bi bi-tools"></i>

        Mantenimientos

    </h2>

    <!-- Botón nuevo -->
    <a href="crear.php" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Nuevo Mantenimiento

    </a>

</div>

<!-- Tarjeta -->
<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <!-- Tabla responsive -->
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <!-- Cabecera -->
                <thead class="table">

                    <tr>

                        <th>Moto</th>

                        <th>Propietario</th>

                        <th>Fecha</th>

                        <th>Descripción</th>

                        <th>Costo</th>

                        <th>Estado</th>

                        <th>Acciones</th>

                    </tr>

                </thead>

                <!-- Cuerpo -->
                <tbody>

                    <?php if (!empty($mantenimientos)): ?>

                        <?php foreach ($mantenimientos as $mantenimiento): ?>

                            <tr>

                                <!-- Moto -->
                                <td>

                                    <?php

                                    echo $mantenimiento["placa"] . " - " .
                                         $mantenimiento["marca"] . " " .
                                         $mantenimiento["modelo"];

                                    ?>

                                </td>

                                <!-- Propietario -->
                                <td>

                                    <?php

                                    echo $mantenimiento["nombres"] . " " .
                                         $mantenimiento["apellidos"];

                                    ?>

                                </td>

                                <!-- Fecha -->
                                <td>

                                    <?php echo $mantenimiento["fecha"]; ?>

                                </td>

                                <!-- Descripción -->
                                <td>

                                    <?php echo $mantenimiento["descripcion"]; ?>

                                </td>

                                <!-- Costo -->
                                <td>

                                    $ <?php echo $mantenimiento["costo"]; ?>

                                </td>

                                <!-- Estado -->
                                <td>

                                    <?php if ($mantenimiento["estado"] == "Pendiente"): ?>

                                        <span class="badge bg-warning text-dark">

                                            Pendiente

                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-success">

                                            Finalizado

                                        </span>

                                    <?php endif; ?>

                                </td>

                                <!-- Acciones -->
                                <td>

                                    <!-- Editar -->
                                    <a 
                                        href="editar.php?id=<?php echo $mantenimiento['id_mantenimiento']; ?>"
                                        class="btn btn-warning btn-sm"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <!-- Eliminar -->
<button 
    type="button"
    class="btn btn-danger btn-sm btn-eliminar-mantenimiento"
    data-url="../../controllers/MantenimientoController.php?eliminar=<?php echo $mantenimiento['id_mantenimiento']; ?>"
>
    <i class="bi bi-trash-fill"></i>
</button>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="7" class="text-center text-muted">

                                No existen mantenimientos registrados

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php

/*
|--------------------------------------------------------------------------
| Obtener contenido
|--------------------------------------------------------------------------
*/

$contenido = ob_get_clean();

/*
|--------------------------------------------------------------------------
| Cargar layout
|--------------------------------------------------------------------------
*/

include "../layouts/app.php";

?>
