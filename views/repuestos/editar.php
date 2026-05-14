<?php

/*
|--------------------------------------------------------------------------
| Vista editar repuesto
|--------------------------------------------------------------------------
| Formulario para actualizar repuestos registrados.
|--------------------------------------------------------------------------
*/

require_once "../../models/Repuesto.php";

$modelo = new Repuesto();

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$repuesto = $modelo->obtenerPorId($_GET["id"]);

if (!$repuesto) {
    echo "Repuesto no encontrado";
    exit();
}

$titulo = "Editar Repuesto";

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        <i class="bi bi-pencil-square"></i>
        Editar Repuesto
    </h2>

    <a href="index.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Volver
    </a>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <form 
            action="../../controllers/RepuestoController.php"
            method="POST"
        >

            <input 
                type="hidden"
                name="id_repuesto"
                value="<?php echo $repuesto['id_repuesto']; ?>"
            >

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input 
                        type="text"
                        name="nombre"
                        class="form-control"
                        value="<?php echo $repuesto['nombre']; ?>"
                        required
                    >

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Stock
                    </label>

                    <input 
                        type="number"
                        name="stock"
                        class="form-control"
                        min="0"
                        value="<?php echo $repuesto['stock']; ?>"
                        required
                    >

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Precio
                    </label>

                    <input 
                        type="number"
                        name="precio"
                        class="form-control"
                        step="0.01"
                        min="0"
                        value="<?php echo $repuesto['precio']; ?>"
                        required
                    >

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Descripción
                </label>

                <textarea 
                    name="descripcion"
                    class="form-control"
                    rows="4"
                ><?php echo $repuesto['descripcion']; ?></textarea>

            </div>

            <button 
                type="submit"
                name="actualizar"
                class="btn btn-warning"
            >
                <i class="bi bi-save-fill"></i>
                Actualizar Repuesto
            </button>

        </form>

    </div>

</div>

<?php

$contenido = ob_get_clean();

include "../layouts/app.php";

?>