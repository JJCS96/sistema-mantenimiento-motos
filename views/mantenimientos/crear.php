<?php

/*
|--------------------------------------------------------------------------
| Vista registrar mantenimiento
|--------------------------------------------------------------------------
| Formulario para registrar mantenimientos.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Importar modelos
|--------------------------------------------------------------------------
*/

require_once "../../models/Moto.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelo moto
|--------------------------------------------------------------------------
*/

$modeloMoto = new Moto();

/*
|--------------------------------------------------------------------------
| Obtener motos
|--------------------------------------------------------------------------
*/

$motos = $modeloMoto->obtenerTodas();

/*
|--------------------------------------------------------------------------
| Título de la página
|--------------------------------------------------------------------------
*/

$titulo = "Registrar Mantenimiento";

/*
|--------------------------------------------------------------------------
| Iniciar buffer
|--------------------------------------------------------------------------
*/

ob_start();

?>

<!-- Encabezado -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>

        <i class="bi bi-tools"></i>

        Registrar Mantenimiento

    </h2>

    <!-- Botón volver -->
    <a href="index.php" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Volver

    </a>

</div>

<!-- Tarjeta principal -->
<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <!-- Formulario -->
        <form 
            action="../../controllers/MantenimientoController.php"
            method="POST"
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

                    <option value="">
                        Seleccione una moto
                    </option>

                    <?php foreach ($motos as $moto): ?>

                        <option value="<?php echo $moto['id_moto']; ?>">

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
                ></textarea>

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

                        <option value="Pendiente">
                            Pendiente
                        </option>

                        <option value="Finalizado">
                            Finalizado
                        </option>

                    </select>

                </div>

            </div>

            <!-- Botón -->
            <button 
                type="submit"
                name="registrar"
                class="btn btn-primary"
            >

                <i class="bi bi-save-fill"></i>

                Guardar Mantenimiento

            </button>

        </form>

    </div>

</div>

<?php

/*
|--------------------------------------------------------------------------
| Obtener contenido generado
|--------------------------------------------------------------------------
*/

$contenido = ob_get_clean();

/*
|--------------------------------------------------------------------------
| Cargar layout principal
|--------------------------------------------------------------------------
*/

include "../layouts/app.php";

?>