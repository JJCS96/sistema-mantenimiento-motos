<?php

/*
|--------------------------------------------------------------------------
| Vista listado de clientes
|--------------------------------------------------------------------------
| Muestra la tabla de clientes registrados.
*/

require_once __DIR__ . "/../../models/Cliente.php";

$titulo = "Clientes - Sistema de Motos";
$modulo = "clientes";

$clienteModel = new Cliente();
$clientes = $clienteModel->listar();

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Clientes</h3>

    <a href="crear.php" class="btn btn-primary">
        + Nuevo Cliente
    </a>
</div>

<div class="panel">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cédula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($cliente = $clientes->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $cliente["id_cliente"]; ?></td>
                    <td><?php echo $cliente["cedula"]; ?></td>
                    <td><?php echo $cliente["nombres"]; ?></td>
                    <td><?php echo $cliente["apellidos"]; ?></td>
                    <td><?php echo $cliente["telefono"]; ?></td>
                    <td><?php echo $cliente["correo"]; ?></td>
                    <td>
                        <a 
                            href="editar.php?id=<?php echo $cliente["id_cliente"]; ?>" 
                            class="btn btn-warning btn-sm"
                        >
                            Editar
                        </a>

                        <a 
                            href="<?php echo BASE_URL; ?>controllers/ClienteController.php?action=eliminar&id=<?php echo $cliente["id_cliente"]; ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="confirmarEliminacion(event)"
                        >
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php

$contenido = ob_get_clean();

$alerta = "";

if (isset($_GET["success"]) && $_GET["success"] == "registrado") {
    $alerta = "<script>Swal.fire('Correcto', 'Cliente registrado correctamente', 'success');</script>";
}

if (isset($_GET["success"]) && $_GET["success"] == "actualizado") {
    $alerta = "<script>Swal.fire('Correcto', 'Cliente actualizado correctamente', 'success');</script>";
}

if (isset($_GET["success"]) && $_GET["success"] == "eliminado") {
    $alerta = "<script>Swal.fire('Correcto', 'Cliente eliminado correctamente', 'success');</script>";
}

include "../layouts/app.php";

?>