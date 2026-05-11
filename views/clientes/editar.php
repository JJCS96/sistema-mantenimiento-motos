<?php

/*
|--------------------------------------------------------------------------
| Vista editar cliente
|--------------------------------------------------------------------------
| Formulario para actualizar un cliente registrado.
*/

require_once __DIR__ . "/../../models/Cliente.php";

$titulo = "Editar Cliente - Sistema de Motos";
$modulo = "clientes";

$clienteModel = new Cliente();
$cliente = $clienteModel->obtenerPorId($_GET["id"]);

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Editar Cliente</h3>

    <a href="index.php" class="btn btn-secondary">
        Volver
    </a>
</div>

<div class="panel">

    <form action="<?php echo BASE_URL; ?>controllers/ClienteController.php?action=actualizar" method="POST">

        <input type="hidden" name="id_cliente" value="<?php echo $cliente["id_cliente"]; ?>">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Cédula</label>
                <input 
                    type="text" 
                    name="cedula" 
                    class="form-control" 
                    value="<?php echo $cliente["cedula"]; ?>" 
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Nombres</label>
                <input 
                    type="text" 
                    name="nombres" 
                    class="form-control" 
                    value="<?php echo $cliente["nombres"]; ?>" 
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Apellidos</label>
                <input 
                    type="text" 
                    name="apellidos" 
                    class="form-control" 
                    value="<?php echo $cliente["apellidos"]; ?>" 
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Teléfono</label>
                <input 
                    type="text" 
                    name="telefono" 
                    class="form-control" 
                    value="<?php echo $cliente["telefono"]; ?>"
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Correo</label>
                <input 
                    type="email" 
                    name="correo" 
                    class="form-control" 
                    value="<?php echo $cliente["correo"]; ?>"
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Dirección</label>
                <input 
                    type="text" 
                    name="direccion" 
                    class="form-control" 
                    value="<?php echo $cliente["direccion"]; ?>"
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
    $alerta = "<script>Swal.fire('Error', 'No se pudo actualizar el cliente', 'error');</script>";
}

include "../layouts/app.php";

?>