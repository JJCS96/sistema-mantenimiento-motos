<?php

/*
|--------------------------------------------------------------------------
| Vista registrar repuesto
|--------------------------------------------------------------------------
| Formulario para registrar repuestos.
|--------------------------------------------------------------------------
*/

$titulo = "Registrar Repuesto";

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        <i class="bi bi-box-seam"></i>
        Registrar Repuesto
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

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input 
                        type="text"
                        name="nombre"
                        class="form-control"
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
                ></textarea>

            </div>

            <button 
                type="submit"
                name="registrar"
                class="btn btn-primary"
            >
                <i class="bi bi-save-fill"></i>
                Guardar Repuesto
            </button>

        </form>

    </div>

</div>

<?php

$contenido = ob_get_clean();

include "../layouts/app.php";

?>