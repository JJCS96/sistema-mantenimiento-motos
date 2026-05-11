<?php

/*
|--------------------------------------------------------------------------
| Vista crear moto
|--------------------------------------------------------------------------
| Formulario para registrar una nueva moto.
*/

require_once __DIR__ . "/../../models/Cliente.php";

$titulo = "Nueva Moto - Sistema de Motos";
$modulo = "motos";

$clienteModel = new Cliente();
$clientes = $clienteModel->listar();

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Nueva Moto</h3>

    <a href="index.php" class="btn btn-secondary">
        Volver
    </a>
</div>

<div class="panel">

    <form action="<?php echo BASE_URL; ?>controllers/MotoController.php?action=guardar" method="POST">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Cliente</label>
                <select name="id_cliente" class="form-control" required>
                    <option value="">Seleccione un cliente</option>

                    <?php while ($cliente = $clientes->fetch_assoc()) { ?>
                        <option value="<?php echo $cliente["id_cliente"]; ?>">
                            <?php echo $cliente["nombres"] . " " . $cliente["apellidos"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Placa</label>
                <input type="text" name="placa" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Marca</label>
                <input type="text" name="marca" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Modelo</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Año</label>
                <input type="number" name="anio" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Color</label>
                <input type="text" name="color" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Cilindraje</label>
                <input type="text" name="cilindraje" class="form-control">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Guardar
        </button>

        <a href="index.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php

$contenido = ob_get_clean();

$alerta = "";

if (isset($_GET["error"])) {
    $alerta = "<script>Swal.fire('Error', 'No se pudo registrar la moto', 'error');</script>";
}

include "../layouts/app.php";

?>