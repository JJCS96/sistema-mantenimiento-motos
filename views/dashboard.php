<?php

/*
|--------------------------------------------------------------------------
| Dashboard principal
|--------------------------------------------------------------------------
| Pantalla inicial después del login.
*/

$titulo = "Dashboard - Sistema de Motos";
$modulo = "dashboard";

// Iniciar captura del contenido
ob_start();

?>

<h3 class="mb-4">Dashboard</h3>

<div class="row">

    <div class="col-md-3">
        <div class="card-dashboard blue">
            <div>
                <h5>Clientes</h5>
                <h2>25</h2>
                <small>Registrados</small>
            </div>
            <div class="card-icon">👥</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-dashboard green">
            <div>
                <h5>Motos</h5>
                <h2>40</h2>
                <small>Registradas</small>
            </div>
            <div class="card-icon">🏍️</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-dashboard yellow">
            <div>
                <h5>Mantenimientos</h5>
                <h2>15</h2>
                <small>En proceso</small>
            </div>
            <div class="card-icon">🔧</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-dashboard purple">
            <div>
                <h5>Repuestos</h5>
                <h2>120</h2>
                <small>En inventario</small>
            </div>
            <div class="card-icon">📦</div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-8">
        <div class="panel">
            <div class="panel-header">
                <h5>Mantenimientos recientes</h5>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Moto</th>
                        <th>Cliente</th>
                        <th>Fecha ingreso</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Yamaha FZ 150</td>
                        <td>Carlos Mendoza</td>
                        <td>20/05/2026</td>
                        <td><span class="badge bg-warning">En reparación</span></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Honda CB 190R</td>
                        <td>María Zambrano</td>
                        <td>18/05/2026</td>
                        <td><span class="badge bg-info">En revisión</span></td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Suzuki GN 125</td>
                        <td>Luis Sánchez</td>
                        <td>17/05/2026</td>
                        <td><span class="badge bg-secondary">Pendiente</span></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="col-md-4">
        <div class="panel">
            <div class="panel-header">
                <h5>Resumen mensual</h5>
            </div>

            <div class="summary-item">
                <span>Mantenimientos realizados</span>
                <strong>28</strong>
            </div>

            <div class="summary-item">
                <span>Ingresos por mano de obra</span>
                <strong>$ 560.00</strong>
            </div>

            <div class="summary-item">
                <span>Repuestos vendidos</span>
                <strong>$ 1,250.50</strong>
            </div>

            <div class="summary-item total">
                <span>Total general</span>
                <strong>$ 1,810.50</strong>
            </div>

        </div>
    </div>

</div>

<?php

// Guardar contenido en variable
$contenido = ob_get_clean();

// Preparar alerta de login correcto
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

// Cargar layout principal
include "layouts/app.php";

?>