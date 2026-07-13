<?php

require_once "../../includes/validar_sesion.php";

/*
|--------------------------------------------------------------------------
| Vista principal de motos
|--------------------------------------------------------------------------
| Muestra el listado de motos registradas en el sistema.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Importar modelo Moto
|--------------------------------------------------------------------------
*/

require_once "../../models/Moto.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelo
|--------------------------------------------------------------------------
*/

$modelo = new Moto();

/*
|--------------------------------------------------------------------------
| Obtener motos
|--------------------------------------------------------------------------
*/

$motos = $modelo->obtenerTodas();

/*
|--------------------------------------------------------------------------
| Título de la página
|--------------------------------------------------------------------------
*/

$titulo = "Motos";

/*
|--------------------------------------------------------------------------
| Alertas SweetAlert
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
            title: 'Moto registrada',
            text: 'La moto fue registrada correctamente',
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
            title: 'Moto actualizada',
            text: 'La moto fue actualizada correctamente',
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
            title: 'Moto eliminada',
            text: 'La moto fue eliminada correctamente',
            timer: 2000,
            showConfirmButton: false

        });

    </script>

    ";
}

if (isset($_GET["dependencia"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'warning',
            title: 'No se puede eliminar',
            text: 'La moto tiene mantenimientos asociados',
            timer: 2500,
            showConfirmButton: false

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

        <i class="bi bi-bicycle"></i>

        Motos

    </h2>

    <!-- Botón nueva moto -->
    <a href="crear.php" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Nueva Moto

    </a>

</div>

<!-- Tarjeta principal -->
<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <!-- Tabla responsive -->
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <!-- Cabecera -->
                <thead class="table">

                    <tr>

                        <th>Placa</th>

                        <th>Marca</th>

                        <th>Modelo</th>

                        <th>Color</th>

                        <th>Año</th>

                        <th>Propietario</th>

                        <th>Acciones</th>

                    </tr>

                </thead>

                <!-- Cuerpo -->
                <tbody>

                    <?php if (!empty($motos)): ?>

                        <?php foreach ($motos as $moto): ?>

                            <tr>

                                <!-- Placa -->
                                <td>

                                    <?php echo $moto["placa"]; ?>

                                </td>

                                <!-- Marca -->
                                <td>

                                    <?php echo $moto["marca"]; ?>

                                </td>

                                <!-- Modelo -->
                                <td>

                                    <?php echo $moto["modelo"]; ?>

                                </td>

                                <!-- Color -->
                                <td>

                                    <?php echo $moto["color"]; ?>

                                </td>

                                <!-- Año -->
                                <td>

                                    <?php echo $moto["anio"]; ?>

                                </td>

                                <!-- Propietario -->
                                <td>

                                    <?php

                                    echo $moto["nombres"] . " " .
                                         $moto["apellidos"];

                                    ?>

                                </td>

                                <!-- Acciones -->
                                <td>

                                    <!-- Botón editar -->
                                    <a 
                                        href="editar.php?id=<?php echo $moto['id_moto']; ?>"
                                        class="btn btn-warning btn-sm"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <!-- Botón eliminar -->
                                    <button 
                                        class="btn btn-danger btn-sm btn-eliminar-moto"
                                        data-id="<?php echo $moto['id_moto']; ?>"
                                    >

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <!-- Sin registros -->
                        <tr>

                            <td colspan="7" class="text-center text-muted">

                                No existen motos registradas

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
| Obtener contenido generado
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
