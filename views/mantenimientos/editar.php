<?php

/*
|--------------------------------------------------------------------------
| Vista editar mantenimiento
|--------------------------------------------------------------------------
*/

require_once "../../models/Mantenimiento.php";
require_once "../../models/Moto.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelos
|--------------------------------------------------------------------------
*/

$modeloMantenimiento = new Mantenimiento();

$modeloMoto = new Moto();

/*
|--------------------------------------------------------------------------
| Validar ID
|--------------------------------------------------------------------------
*/

if (!isset($_GET["id"])) {

    header("Location: index.php");
    exit();
}

/*
|--------------------------------------------------------------------------
| Obtener mantenimiento
|--------------------------------------------------------------------------
*/

$id = $_GET["id"];

$mantenimiento = $modeloMantenimiento->obtenerPorId($id);

/*
|--------------------------------------------------------------------------
| Validar mantenimiento
|--------------------------------------------------------------------------
*/

if (!$mantenimiento) {

    echo "Mantenimiento no encontrado";
    exit();
}

/*
|--------------------------------------------------------------------------
| Obtener motos
|--------------------------------------------------------------------------
*/

$motos = $modeloMoto->obtenerTodas();

/*
|--------------------------------------------------------------------------
| Título
|--------------------------------------------------------------------------
*/

$titulo = "Editar Mantenimiento";

/*
|--------------------------------------------------------------------------
| Buffer
|--------------------------------------------------------------------------
*/

ob_start();

?>

<!-- Encabezado -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>

        <i class="bi bi-pencil-square"></i>

        Editar Mantenimiento

    </h2>

    <a href="index.php" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Volver

    </a>

</div>

<!-- Card -->
<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <!-- Formulario -->
        <form 
            action="../../controllers/MantenimientoController.php"
            method="POST"
        >

            <!-- ID -->
            <input 
                type="hidden"
                name="id_mantenimiento"
                value="<?php echo $mantenimiento['id_mantenimiento']; ?>"
            >

            <!-- Moto -->
            <div class="mb-3">

                <label class="form-label">
                    Moto
                </label>

                <select 
                    name="id_moto"
                    class="form-select"
                    required
                >

                    <?php foreach ($motos as $moto): ?>

                        <option 
                            value="<?php echo $moto['id_moto']; ?>"

                            <?php
                            if ($moto['id_moto'] == $mantenimiento['id_moto']) {
                                echo "selected";
                            }
                            ?>
                        >

                            <?php

                            echo $moto["placa"] . " - " .
                                 $moto["marca"] . " " .
                                 $moto["modelo"];

                            ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- Fecha -->
            <div class="mb-3">

                <label class="form-label">
                    Fecha
                </label>

                <input 
                    type="date"
                    name="fecha"
                    class="form-control"
                    value="<?php echo $mantenimiento['fecha']; ?>"
                    required
                >

            </div>

            <!-- Descripción -->
            <div class="mb-3">

                <label class="form-label">
                    Descripción
                </label>

                <textarea 
                    name="descripcion"
                    class="form-control"
                    rows="4"
                    required
                ><?php echo $mantenimiento['descripcion']; ?></textarea>

            </div>

            <!-- Fila -->
            <div class="row">

                <!-- Costo -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Costo
                    </label>

                    <input 
                        type="number"
                        name="costo"
                        class="form-control"
                        step="0.01"
                        min="0"
                        value="<?php echo $mantenimiento['costo']; ?>"
                        required
                    >

                </div>

                <!-- Estado -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Estado
                    </label>

                    <select 
                        name="estado"
                        class="form-select"
                        required
                    >

                        <option 
                            value="Pendiente"

                            <?php
                            if ($mantenimiento['estado'] == "Pendiente") {
                                echo "selected";
                            }
                            ?>
                        >
                            Pendiente
                        </option>

                        <option 
                            value="Finalizado"

                            <?php
                            if ($mantenimiento['estado'] == "Finalizado") {
                                echo "selected";
                            }
                            ?>
                        >
                            Finalizado
                        </option>

                    </select>

                </div>

            </div>

            <!-- Botón -->
            <button 
                type="submit"
                name="actualizar"
                class="btn btn-warning"
            >

                <i class="bi bi-save-fill"></i>

                Actualizar Mantenimiento

            </button>

        </form>

    </div>

</div>

<?php

$contenido = ob_get_clean();

include "../layouts/app.php";

?>