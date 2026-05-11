<?php

/*
|--------------------------------------------------------------------------
| Vista listado de motos
|--------------------------------------------------------------------------
| Muestra las motos registradas y su cliente propietario.
*/

require_once __DIR__ . "/../../models/Moto.php";

$titulo = "Motos - Sistema de Motos";
$modulo = "motos";

$motoModel = new Moto();
$motos = $motoModel->listar();

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Motos</h3>

    <a href="crear.php" class="btn btn-primary">
        + Nueva Moto
    </a>
</div>

<div class="panel">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Cilindraje</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($moto = $motos->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $moto["id_moto"]; ?></td>
                    <td><?php echo $moto["nombres"] . " " . $moto["apellidos"]; ?></td>
                    <td><?php echo $moto["placa"]; ?></td>
                    <td><?php echo $moto["marca"]; ?></td>
                    <td><?php echo $moto["modelo"]; ?></td>
                    <td><?php echo $moto["anio"]; ?></td>
                    <td><?php echo $moto["color"]; ?></td>
                    <td><?php echo $moto["cilindraje"]; ?></td>
                    <td>
                        <a 
                            href="editar.php?id=<?php echo $moto["id_moto"]; ?>" 
                            class="btn btn-warning btn-sm"
                        >
                            Editar
                        </a>

                        <a 
                            href="<?php echo BASE_URL; ?>controllers/MotoController.php?action=eliminar&id=<?php echo $moto["id_moto"]; ?>" 
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
    $alerta = "<script>Swal.fire('Correcto', 'Moto registrada correctamente', 'success');</script>";
}

if (isset($_GET["success"]) && $_GET["success"] == "actualizado") {
    $alerta = "<script>Swal.fire('Correcto', 'Moto actualizada correctamente', 'success');</script>";
}

if (isset($_GET["success"]) && $_GET["success"] == "eliminado") {
    $alerta = "<script>Swal.fire('Correcto', 'Moto eliminada correctamente', 'success');</script>";
}

include "../layouts/app.php";

?>