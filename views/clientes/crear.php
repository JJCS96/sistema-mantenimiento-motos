<?php

/*
|--------------------------------------------------------------------------
| Vista crear cliente
|--------------------------------------------------------------------------
| Formulario para registrar un nuevo cliente.
*/

$titulo = "Nuevo Cliente - Sistema de Motos";
$modulo = "clientes";

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Nuevo Cliente</h3>

    <a href="index.php" class="btn btn-secondary">
        Volver
    </a>
</div>

<div class="panel">

    <form action="<?php echo BASE_URL; ?>controllers/ClienteController.php?action=guardar" method="POST">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Cédula</label>
                <input type="text" name="cedula" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Nombres</label>
                <input type="text" name="nombres" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Apellidos</label>
                <input type="text" name="apellidos" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control">
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
    $alerta = "<script>Swal.fire('Error', 'No se pudo registrar el cliente', 'error');</script>";
}

include "../layouts/app.php";

?>