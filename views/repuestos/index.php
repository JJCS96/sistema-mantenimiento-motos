<?php

/*
|--------------------------------------------------------------------------
| Vista principal de repuestos
|--------------------------------------------------------------------------
| Muestra el listado de repuestos registrados.
|--------------------------------------------------------------------------
*/

require_once "../../models/Repuesto.php";

$modelo = new Repuesto();

$repuestos = $modelo->obtenerTodos();

$titulo = "Repuestos";

$alerta = "";

/*
|--------------------------------------------------------------------------
| Alertas
|--------------------------------------------------------------------------
*/

if (isset($_GET["success"])) {
    $alerta = "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Repuesto registrado',
            text: 'El repuesto fue registrado correctamente',
            timer: 2000,
            showConfirmButton: false
        });
    </script>";
}

if (isset($_GET["update"])) {
    $alerta = "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Repuesto actualizado',
            text: 'El repuesto fue actualizado correctamente',
            timer: 2000,
            showConfirmButton: false
        });
    </script>";
}

if (isset($_GET["delete"])) {
    $alerta = "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Repuesto eliminado',
            text: 'El repuesto fue eliminado correctamente',
            timer: 2000,
            showConfirmButton: false
        });
    </script>";
}

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        <i class="bi bi-box-seam"></i>
        Repuestos
    </h2>

    <a href="crear.php" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Nuevo Repuesto
    </a>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($repuestos)): ?>

                        <?php foreach ($repuestos as $repuesto): ?>

                            <tr>

                                <td>
                                    <?php echo $repuesto["nombre"]; ?>
                                </td>

                                <td>
                                    <?php echo $repuesto["descripcion"]; ?>
                                </td>

                                <td>
                                    <?php echo $repuesto["stock"]; ?>
                                </td>

                                <td>
                                    $ <?php echo $repuesto["precio"]; ?>
                                </td>

                                <td>

                                    <a 
                                        href="editar.php?id=<?php echo $repuesto['id_repuesto']; ?>"
                                        class="btn btn-warning btn-sm"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <button 
                                        type="button"
                                        class="btn btn-danger btn-sm btn-eliminar-repuesto"
                                        data-url="../../controllers/RepuestoController.php?eliminar=<?php echo $repuesto['id_repuesto']; ?>"
                                    >
                                        <i class="bi bi-trash-fill"></i>
                                    </button>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No existen repuestos registrados
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php

$contenido = ob_get_clean();

include "../layouts/app.php";

?>