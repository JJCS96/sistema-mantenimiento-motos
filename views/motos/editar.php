<?php

/*
|--------------------------------------------------------------------------
| Vista editar moto
|--------------------------------------------------------------------------
| Formulario para actualizar una moto registrada.
*/

require_once __DIR__ . "/../../models/Moto.php";
require_once __DIR__ . "/../../models/Cliente.php";

$titulo = "Editar Moto - Sistema de Motos";
$modulo = "motos";

$motoModel = new Moto();
$clienteModel = new Cliente();

$moto = $motoModel->obtenerPorId($_GET["id"]);
$clientes = $clienteModel->listar();

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Editar Moto</h3>

    <a href="index.php" class="btn btn-secondary">
        Volver
    </a>
</div>

<div class="panel">

    <form action="<?php echo BASE_URL; ?>controllers/MotoController.php?action=actualizar" method="POST">

        <input type="hidden" name="id_moto" value="<?php echo $moto["id_moto"]; ?>">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Cliente</label>
                <select name="id_cliente" class="form-control" required>
                    <option value="">Seleccione un cliente</option>

                    <?php while ($cliente = $clientes->fetch_assoc()) { ?>
                        <option 
                            value="<?php echo $cliente["id_cliente"]; ?>"
                            <?php if ($cliente["id_cliente"] == $moto["id_cliente"]) echo "selected"; ?>
                        >
                            <?php echo $cliente["nombres"] . " " . $cliente["apellidos"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Placa</label>
                <input 
                    type="text" 
                    name="placa" 
                    class="form-control" 
                    value="<?php echo $moto["placa"]; ?>" 
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Marca</label>
                <input 
                    type="text" 
                    name="marca" 
                    class="form-control" 
                    value="<?php echo $moto["marca"]; ?>" 
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Modelo</label>
                <input 
                    type="text" 
                    name="modelo" 
                    class="form-control" 
                    value="<?php echo $moto["modelo"]; ?>" 
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Año</label>
                <input 
                    type="number" 
                    name="anio" 
                    class="form-control" 
                    value="<?php echo $moto["anio"]; ?>"
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Color</label>
                <input 
                    type="text" 
                    name="color" 
                    class="form-control" 
                    value="<?php echo $moto["color"]; ?>"
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Cilindraje</label>
                <input 
                    type="text" 
                    name="cilindraje" 
                    class="form-control" 
                    value="<?php echo $moto["cilindraje"]; ?>"
                >
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Actualizar
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
    $alerta = "<script>Swal.fire('Error', 'No se pudo actualizar la moto', 'error');</script>";
}

include "../layouts/app.php";

?>