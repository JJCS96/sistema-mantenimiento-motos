<?php

/*
|--------------------------------------------------------------------------
| Dashboard principal
|--------------------------------------------------------------------------
| Muestra resumen general del sistema con datos reales.
|--------------------------------------------------------------------------
*/

require_once "../models/Cliente.php";
require_once "../models/Moto.php";
require_once "../models/Mantenimiento.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelos
|--------------------------------------------------------------------------
*/

$modeloCliente = new Cliente();
$modeloMoto = new Moto();
$modeloMantenimiento = new Mantenimiento();

/*
|--------------------------------------------------------------------------
| Obtener datos
|--------------------------------------------------------------------------
*/

$totalClientes = $modeloCliente->contarClientes();
$totalMotos = $modeloMoto->contarMotos();
$totalMantenimientos = $modeloMantenimiento->contarMantenimientos();
$ultimosMantenimientos = $modeloMantenimiento->obtenerUltimos();

/*
|--------------------------------------------------------------------------
| Título
|--------------------------------------------------------------------------
*/

$titulo = "Dashboard";

/*
|--------------------------------------------------------------------------
| Iniciar buffer
|--------------------------------------------------------------------------
*/

ob_start();

?>

<!-- Encabezado -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </h2>

        <p class="text-muted mb-0">
            Resumen general del sistema de mantenimiento de motos
        </p>
    </div>

</div>

<!-- Tarjetas resumen -->
<div class="row g-4 mb-4">

    <!-- Clientes -->
    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4 bg-primary text-white">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <h6 class="text-uppercase">Clientes</h6>
                    <h2 class="fw-bold mb-0">
                        <?php echo $totalClientes; ?>
                    </h2>
                </div>

                <i class="bi bi-people-fill fs-1"></i>

            </div>

        </div>

    </div>

    <!-- Motos -->
    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4 bg-success text-white">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <h6 class="text-uppercase">Motos</h6>
                    <h2 class="fw-bold mb-0">
                        <?php echo $totalMotos; ?>
                    </h2>
                </div>

                <i class="bi bi-bicycle fs-1"></i>

            </div>

        </div>

    </div>

    <!-- Mantenimientos -->
    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4 bg-warning text-dark">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <h6 class="text-uppercase">Mantenimientos</h6>
                    <h2 class="fw-bold mb-0">
                        <?php echo $totalMantenimientos; ?>
                    </h2>
                </div>

                <i class="bi bi-tools fs-1"></i>

            </div>

        </div>

    </div>

</div>

<!-- Accesos rápidos -->
<div class="card border-0 shadow rounded-4 mb-4">

    <div class="card-header bg-dark text-white rounded-top-4">

        <h5 class="mb-0">
            <i class="bi bi-lightning-fill"></i>
            Accesos rápidos
        </h5>

    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-4">

                <a href="clientes/crear.php" class="btn btn-primary w-100 py-3">
                    <i class="bi bi-person-plus-fill"></i>
                    Registrar Cliente
                </a>

            </div>

            <div class="col-md-4">

                <a href="motos/crear.php" class="btn btn-success w-100 py-3">
                    <i class="bi bi-bicycle"></i>
                    Registrar Moto
                </a>

            </div>

            <div class="col-md-4">

                <a href="mantenimientos/crear.php" class="btn btn-warning w-100 py-3">
                    <i class="bi bi-tools"></i>
                    Nuevo Mantenimiento
                </a>

            </div>

        </div>

    </div>

</div>

<!-- Últimos mantenimientos -->
<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-secondary text-white rounded-top-4">

        <h5 class="mb-0">
            <i class="bi bi-clock-history"></i>
            Últimos mantenimientos
        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>Moto</th>
                        <th>Propietario</th>
                        <th>Fecha</th>
                        <th>Costo</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (!empty($ultimosMantenimientos)): ?>

                        <?php foreach ($ultimosMantenimientos as $mantenimiento): ?>

                            <tr>

                                <td>
                                    <?php 
                                        echo $mantenimiento["placa"] . " - " .
                                             $mantenimiento["marca"] . " " .
                                             $mantenimiento["modelo"];
                                    ?>
                                </td>

                                <td>
                                    <?php 
                                        echo $mantenimiento["nombres"] . " " .
                                             $mantenimiento["apellidos"];
                                    ?>
                                </td>

                                <td>
                                    <?php echo $mantenimiento["fecha"]; ?>
                                </td>

                                <td>
                                    $ <?php echo $mantenimiento["costo"]; ?>
                                </td>

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

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center text-muted">
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
| Alerta login
|--------------------------------------------------------------------------
*/

$alerta = "";

if (isset($_GET["login"]) && $_GET["login"] == "success") {

    $alerta = "

    <script>

        Swal.fire({
            icon: 'success',
            title: 'Bienvenido',
            text: 'Inicio de sesión correcto',
            timer: 1800,
            showConfirmButton: false
        });

    </script>

    ";
}

/*
|--------------------------------------------------------------------------
| Guardar contenido y cargar layout
|--------------------------------------------------------------------------
*/

$contenido = ob_get_clean();

include "layouts/app.php";

?>