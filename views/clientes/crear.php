<?php

require_once "../../includes/validar_sesion.php";

/*
|--------------------------------------------------------------------------
| Vista crear cliente
|--------------------------------------------------------------------------
| Formulario para registrar nuevos clientes.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Título de la página
|--------------------------------------------------------------------------
*/

$titulo = "Registrar Cliente";

$alerta = "";

if (isset($_GET["cedula"]) && $_GET["cedula"] === "duplicada") {
    $alerta = "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Cédula duplicada',
            text: 'La cédula ya se encuentra registrada'
        });
    </script>";
}

if (isset($_GET["error"])) {
    $alerta = "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Datos incompletos',
            text: 'Complete los campos obligatorios antes de guardar'
        });
    </script>";
}

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

        <i class="bi bi-person-plus-fill"></i>

        Registrar Cliente

    </h2>

    <!-- Botón volver -->
    <a href="index.php" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Volver

    </a>

</div>

<!-- Tarjeta formulario -->
<div class="card border-0 shadow rounded-4">

    <div class="card-body">

    <!-- Formulario -->
<form 
    action="../../controllers/ClienteController.php"
    method="POST"
>

    <!-- Primera fila -->
    <div class="row">

        <!-- Cédula -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Cédula
            </label>

            <input 
                type="text"
                name="cedula"
                class="form-control"
                required
            >

        </div>

        <!-- Nombres -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Nombres
            </label>

            <input 
                type="text"
                name="nombres"
                class="form-control"
                required
            >

        </div>

    </div>

    <!-- Segunda fila -->
    <div class="row">

        <!-- Apellidos -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Apellidos
            </label>

            <input 
                type="text"
                name="apellidos"
                class="form-control"
                required
            >

        </div>

        <!-- Teléfono -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                Teléfono
            </label>

            <input 
                type="text"
                name="telefono"
                class="form-control"
            >

        </div>

    </div>

    <!-- Correo -->
    <div class="mb-3">

        <label class="form-label">
            Correo
        </label>

        <input 
            type="email"
            name="correo"
            class="form-control"
        >

    </div>

    <!-- Dirección -->
    <div class="mb-3">

        <label class="form-label">
            Dirección
        </label>

        <textarea 
            name="direccion"
            class="form-control"
            rows="3"
        ></textarea>

    </div>

    <!-- Botón -->
    <button 
        type="submit"
        name="registrar"
        class="btn btn-primary"
    >

        <i class="bi bi-save-fill"></i>

        Guardar Cliente

    </button>

</form>


    </div>

</div>

<?php

/*
|--------------------------------------------------------------------------
| Obtener contenido
|--------------------------------------------------------------------------
*/

$contenido = ob_get_clean();

/*
|--------------------------------------------------------------------------
| Cargar layout
|--------------------------------------------------------------------------
*/

include "../layouts/app.php";

?>
