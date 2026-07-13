<?php

require_once "../../includes/validar_sesion.php";

/*
|--------------------------------------------------------------------------
| Vista de reportes básicos
|--------------------------------------------------------------------------
| Permite consultar un resumen general del sistema y tablas principales.
| Esta vista forma parte de la Fase 2 del proyecto.
|--------------------------------------------------------------------------
*/

require_once "../../models/Cliente.php";
require_once "../../models/Moto.php";
require_once "../../models/Mantenimiento.php";
require_once "../../models/Repuesto.php";

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
| Obtener información para reportes
|--------------------------------------------------------------------------
*/

$totalClientes = $modeloCliente->contarClientes();
$totalMotos = $modeloMoto->contarMotos();
$totalMantenimientos = $modeloMantenimiento->contarMantenimientos();
$totalRepuestos = $modeloRepuesto->contarRepuestos();
$totalCostos = $modeloMantenimiento->sumarCostos();
$mantenimientosPendientes = $modeloMantenimiento->contarPorEstado("Pendiente");
$mantenimientosFinalizados = $modeloMantenimiento->contarPorEstado("Finalizado");
$repuestosBajoStock = $modeloRepuesto->obtenerBajoStock();

$clientes = $modeloCliente->obtenerTodos();
$motos = $modeloMoto->obtenerTodas();
$mantenimientos = $modeloMantenimiento->obtenerTodos();
$repuestos = $modeloRepuesto->obtenerTodos();

$titulo = "Reportes";

ob_start();

?>

<!-- Encabezado -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>
            <i class="bi bi-bar-chart-fill"></i>
            Reportes
        </h2>

        <p class="text-muted mb-0">
            Resumen y consultas básicas del sistema de mantenimiento de motos
        </p>
    </div>

    <button type="button" class="btn btn-dark" onclick="window.print()">
        <i class="bi bi-printer-fill"></i>
        Imprimir reporte
    </button>

</div>

<!-- Resumen general -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-primary text-white h-100">
            <div class="card-body">
                <h6 class="text-uppercase">Clientes</h6>
                <h2 class="fw-bold mb-0"><?php echo $totalClientes; ?></h2>
                <small>Total registrados</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-success text-white h-100">
            <div class="card-body">
                <h6 class="text-uppercase">Motos</h6>
                <h2 class="fw-bold mb-0"><?php echo $totalMotos; ?></h2>
                <small>Total registradas</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-warning text-dark h-100">
            <div class="card-body">
                <h6 class="text-uppercase">Mantenimientos</h6>
                <h2 class="fw-bold mb-0"><?php echo $totalMantenimientos; ?></h2>
                <small>Pendientes: <?php echo $mantenimientosPendientes; ?> / Finalizados: <?php echo $mantenimientosFinalizados; ?></small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow rounded-4 bg-info text-dark h-100">
            <div class="card-body">
                <h6 class="text-uppercase">Repuestos</h6>
                <h2 class="fw-bold mb-0"><?php echo $totalRepuestos; ?></h2>
                <small>Total activos</small>
            </div>
        </div>
    </div>

</div>

<!-- Resumen financiero y stock -->
<div class="row g-4 mb-4">

    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h5>
                    <i class="bi bi-cash-coin"></i>
                    Resumen de costos
                </h5>
                <p class="text-muted mb-1">Total registrado en mantenimientos</p>
                <h2 class="fw-bold mb-0">$ <?php echo number_format($totalCostos, 2); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h5>
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Repuestos con bajo stock
                </h5>

                <?php if (!empty($repuestosBajoStock)): ?>
                    <ul class="mb-0">
                        <?php foreach ($repuestosBajoStock as $repuesto): ?>
                            <li>
                                <?php echo $repuesto["nombre"]; ?> -
                                <?php echo $repuesto["stock"]; ?> unidades
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted mb-0">No existen repuestos con bajo stock.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<!-- Reporte de clientes -->
<div class="card border-0 shadow rounded-4 mb-4">
    <div class="card-header bg-dark text-white rounded-top-4">
        <h5 class="mb-0"><i class="bi bi-people-fill"></i> Reporte de clientes</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?php echo $cliente["cedula"]; ?></td>
                                <td><?php echo $cliente["nombres"]; ?></td>
                                <td><?php echo $cliente["apellidos"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["correo"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center text-muted">No existen clientes registrados</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Reporte de motos -->
<div class="card border-0 shadow rounded-4 mb-4">
    <div class="card-header bg-dark text-white rounded-top-4">
        <h5 class="mb-0"><i class="bi bi-bicycle"></i> Reporte de motos</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Propietario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($motos)): ?>
                        <?php foreach ($motos as $moto): ?>
                            <tr>
                                <td><?php echo $moto["placa"]; ?></td>
                                <td><?php echo $moto["marca"]; ?></td>
                                <td><?php echo $moto["modelo"]; ?></td>
                                <td><?php echo $moto["anio"]; ?></td>
                                <td><?php echo $moto["nombres"] . " " . $moto["apellidos"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center text-muted">No existen motos registradas</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Reportes de mantenimientos y repuestos -->
<div class="row g-4 mb-4">

    <div class="col-lg-7">
        <div class="card border-0 shadow rounded-4 h-100">
            <div class="card-header bg-dark text-white rounded-top-4">
                <h5 class="mb-0"><i class="bi bi-tools"></i> Reporte de mantenimientos</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Moto</th>
                                <th>Propietario</th>
                                <th>Fecha</th>
                                <th>Costo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mantenimientos)): ?>
                                <?php foreach ($mantenimientos as $mantenimiento): ?>
                                    <tr>
                                        <td><?php echo $mantenimiento["placa"] . " - " . $mantenimiento["marca"] . " " . $mantenimiento["modelo"]; ?></td>
                                        <td><?php echo $mantenimiento["nombres"] . " " . $mantenimiento["apellidos"]; ?></td>
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
                                <tr><td colspan="5" class="text-center text-muted">No existen mantenimientos registrados</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow rounded-4 h-100">
            <div class="card-header bg-dark text-white rounded-top-4">
                <h5 class="mb-0"><i class="bi bi-box-seam"></i> Reporte de repuestos</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($repuestos)): ?>
                                <?php foreach ($repuestos as $repuesto): ?>
                                    <tr>
                                        <td><?php echo $repuesto["nombre"]; ?></td>
                                        <td>
                                            <?php if ($repuesto["stock"] <= 5): ?>
                                                <span class="badge bg-danger"><?php echo $repuesto["stock"]; ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-success"><?php echo $repuesto["stock"]; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>$ <?php echo number_format($repuesto["precio"], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="3" class="text-center text-muted">No existen repuestos registrados</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php

$contenido = ob_get_clean();

include "../layouts/app.php";

?>
