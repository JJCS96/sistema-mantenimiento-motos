<?php

require_once "../includes/validar_sesion.php";

/*
|--------------------------------------------------------------------------
| Dashboard principal
|--------------------------------------------------------------------------
| Muestra un resumen general del sistema con datos reales.
| Incluye clientes, motos, mantenimientos, repuestos, costos y stock bajo.
|--------------------------------------------------------------------------
*/

require_once "../models/Cliente.php";
require_once "../models/Moto.php";
require_once "../models/Mantenimiento.php";
require_once "../models/Repuesto.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelos
|--------------------------------------------------------------------------
*/

$modeloCliente = new Cliente();
$modeloMoto = new Moto();
$modeloMantenimiento = new Mantenimiento();
$modeloRepuesto = new Repuesto();

/*
|--------------------------------------------------------------------------
| Obtener datos para las tarjetas y tablas del dashboard
|--------------------------------------------------------------------------
*/

$totalClientes = $modeloCliente->contarClientes();
$totalMotos = $modeloMoto->contarMotos();
$totalMantenimientos = $modeloMantenimiento->contarMantenimientos();
$totalRepuestos = $modeloRepuesto->contarRepuestos();

$mantenimientosPendientes = $modeloMantenimiento->contarPorEstado("Pendiente");
$mantenimientosFinalizados = $modeloMantenimiento->contarPorEstado("Finalizado");
$totalCostos = $modeloMantenimiento->sumarCostos();
$repuestosBajoStock = $modeloRepuesto->contarBajoStock();

$ultimosMantenimientos = $modeloMantenimiento->obtenerUltimos();
$listadoBajoStock = $modeloRepuesto->obtenerBajoStock();

$titulo = "Dashboard";

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

<!-- Tarjetas principales -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-primary text-white h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase">Clientes</h6>
                    <h2 class="fw-bold mb-0"><?php echo $totalClientes; ?></h2>
                </div>
                <i class="bi bi-people-fill fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-success text-white h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase">Motos</h6>
                    <h2 class="fw-bold mb-0"><?php echo $totalMotos; ?></h2>
                </div>
                <i class="bi bi-bicycle fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-warning text-dark h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase">Mantenimientos</h6>
                    <h2 class="fw-bold mb-0"><?php echo $totalMantenimientos; ?></h2>
                </div>
                <i class="bi bi-tools fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-info text-dark h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase">Repuestos</h6>
                    <h2 class="fw-bold mb-0"><?php echo $totalRepuestos; ?></h2>
                </div>
                <i class="bi bi-box-seam fs-1"></i>
            </div>
        </div>
    </div>

</div>

<!-- Indicadores secundarios -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <p class="text-muted mb-1">Pendientes</p>
                <h3 class="fw-bold text-warning mb-0"><?php echo $mantenimientosPendientes; ?></h3>
                <small class="text-muted">Mantenimientos por atender</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <p class="text-muted mb-1">Finalizados</p>
                <h3 class="fw-bold text-success mb-0"><?php echo $mantenimientosFinalizados; ?></h3>
                <small class="text-muted">Mantenimientos completados</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <p class="text-muted mb-1">Total generado</p>
                <h3 class="fw-bold mb-0">$ <?php echo number_format($totalCostos, 2); ?></h3>
                <small class="text-muted">Suma de costos registrados</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <p class="text-muted mb-1">Stock bajo</p>
                <h3 class="fw-bold text-danger mb-0"><?php echo $repuestosBajoStock; ?></h3>
                <small class="text-muted">Repuestos con 5 unidades o menos</small>
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

            <div class="col-md-3">
                <a href="clientes/crear.php" class="btn btn-primary w-100 py-3">
                    <i class="bi bi-person-plus-fill"></i>
                    Registrar Cliente
                </a>
            </div>

            <div class="col-md-3">
                <a href="motos/crear.php" class="btn btn-success w-100 py-3">
                    <i class="bi bi-bicycle"></i>
                    Registrar Moto
                </a>
            </div>

            <div class="col-md-3">
                <a href="mantenimientos/crear.php" class="btn btn-warning w-100 py-3">
                    <i class="bi bi-tools"></i>
                    Nuevo Mantenimiento
                </a>
            </div>

            <div class="col-md-3">
                <a href="repuestos/crear.php" class="btn btn-info w-100 py-3">
                    <i class="bi bi-box-seam"></i>
                    Nuevo Repuesto
                </a>
            </div>

        </div>
    </div>

</div>

<div class="row g-4">

    <!-- Últimos mantenimientos -->
    <div class="col-lg-8">

        <div class="card border-0 shadow rounded-4 h-100">

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
                                        <td><?php echo $mantenimiento["fecha"]; ?></td>
                                        <td>$ <?php echo number_format($mantenimiento["costo"], 2); ?></td>
                                        <td>
                                            <?php if ($mantenimiento["estado"] == "Pendiente"): ?>
                                                <span class="badge bg-warning text-dark">Pendiente</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Finalizado</span>
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

    </div>

    <!-- Repuestos con bajo stock -->
    <div class="col-lg-4">

        <div class="card border-0 shadow rounded-4 h-100">

            <div class="card-header bg-danger text-white rounded-top-4">
                <h5 class="mb-0">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Repuestos con bajo stock
                </h5>
            </div>

            <div class="card-body">
                <?php if (!empty($listadoBajoStock)): ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($listadoBajoStock as $repuesto): ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong><?php echo $repuesto["nombre"]; ?></strong><br>
                                    <small class="text-muted">$ <?php echo number_format($repuesto["precio"], 2); ?></small>
                                </div>
                                <span class="badge bg-danger rounded-pill">
                                    <?php echo $repuesto["stock"]; ?> und.
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted mb-0">
                        No existen repuestos con bajo stock.
                    </p>
                <?php endif; ?>
            </div>

        </div>

    </div>

</div>

<?php

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
    </script>";
}

$contenido = ob_get_clean();

include "layouts/app.php";

?>
