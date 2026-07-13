<?php

require_once "../../includes/validar_sesion.php";

/*
|--------------------------------------------------------------------------
| Vista editar cliente
|--------------------------------------------------------------------------
*/

require_once "../../models/Cliente.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelo
|--------------------------------------------------------------------------
*/

$modelo = new Cliente();

/*
|--------------------------------------------------------------------------
| Obtener ID
|--------------------------------------------------------------------------
*/

$id = $_GET["id"];

/*
|--------------------------------------------------------------------------
| Buscar cliente
|--------------------------------------------------------------------------
*/

$cliente = $modelo->obtenerPorId($id);

/*
|--------------------------------------------------------------------------
| Título
|--------------------------------------------------------------------------
*/

$titulo = "Editar Cliente";

$alerta = "";

if (isset($_GET["cedula"]) && $_GET["cedula"] === "duplicada") {
    $alerta = "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Cédula duplicada',
            text: 'Ya existe otro cliente con esa cédula'
        });
    </script>";
}

if (isset($_GET["error"])) {
    $alerta = "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'No se pudo guardar',
            text: 'Revise los datos e intente nuevamente'
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

        <i class="bi bi-pencil-square"></i>

        Editar Cliente

    </h2>

    <a href="index.php" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Volver

    </a>

</div>

<!-- Tarjeta -->
<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <!-- Formulario -->
        <form 
            action="../../controllers/ClienteController.php"
            method="POST"
        >

            <!-- ID oculto -->
            <input 
                type="hidden"
                name="id_cliente"
                value="<?php echo $cliente['id_cliente']; ?>"
            >

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
        value="<?php echo $cliente['cedula']; ?>"
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
                        value="<?php echo $cliente['nombres']; ?>"
                        required
                    >

                </div>

                <!-- Apellidos -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Apellidos
                    </label>

                    <input 
                        type="text"
                        name="apellidos"
                        class="form-control"
                        value="<?php echo $cliente['apellidos']; ?>"
                        required
                    >

                </div>

            </div>

            <div class="row">

                <!-- Teléfono -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Teléfono
                    </label>

                    <input 
                        type="text"
                        name="telefono"
                        class="form-control"
                        value="<?php echo $cliente['telefono']; ?>"
                    >

                </div>

                <!-- Correo -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Correo
                    </label>

                    <input 
                        type="email"
                        name="correo"
                        class="form-control"
                        value="<?php echo $cliente['correo']; ?>"
                    >

                </div>

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
                ><?php echo $cliente['direccion']; ?></textarea>

            </div>

            <!-- Botón -->
            <button 
                type="submit"
                name="actualizar"
                class="btn btn-warning"
            >

                <i class="bi bi-save-fill"></i>

                Actualizar Cliente

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
