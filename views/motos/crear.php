<?php

/*
|--------------------------------------------------------------------------
| Vista registrar moto
|--------------------------------------------------------------------------
| Formulario para registrar motos en el sistema.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Importar modelo Cliente
|--------------------------------------------------------------------------
*/

require_once "../../models/Cliente.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelo cliente
|--------------------------------------------------------------------------
*/

$modeloCliente = new Cliente();

/*
|--------------------------------------------------------------------------
| Obtener clientes
|--------------------------------------------------------------------------
*/

$clientes = $modeloCliente->obtenerTodos();

/*
|--------------------------------------------------------------------------
| Título de la página
|--------------------------------------------------------------------------
*/

$titulo = "Registrar Moto";


/*
|--------------------------------------------------------------------------
| Alertas
|--------------------------------------------------------------------------
*/

$alerta = "";

if (isset($_GET["placa"])) {

    $alerta = "

    <script>

        Swal.fire({

            icon: 'error',
            title: 'Placa duplicada',
            text: 'La placa ya se encuentra registrada'

        });

    </script>

    ";
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

        <i class="bi bi-bicycle"></i>

        Registrar Moto

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
            action="../../controllers/MotoController.php"
            method="POST"
        >

            <!-- Primera fila -->
            <div class="row">

                <!-- Cliente -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Cliente propietario
                    </label>

                    <select 
                        name="id_cliente"
                        class="form-select rounded-3 shadow-sm"
                        required
                    >

                        <option value="">
                            Seleccione un cliente
                        </option>

                        <?php foreach ($clientes as $cliente): ?>

                            <option 
                                value="<?php echo $cliente['id_cliente']; ?>"
                            >

                                <?php

                                echo $cliente["cedula"] . " - " .
                                     $cliente["nombres"] . " " .
                                     $cliente["apellidos"];

                                ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- Placa -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Placa
                    </label>

                    <input 
                        type="text"
                        name="placa"
                        class="form-control rounded-3 shadow-sm"
                        required
                    >

                </div>

            </div>

            <!-- Segunda fila -->
            <div class="row">

                <!-- Marca -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Marca
                    </label>

                    <input 
                        type="text"
                        name="marca"
                        class="form-control rounded-3 shadow-sm"
                        required
                    >

                </div>

                <!-- Modelo -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Modelo
                    </label>

                    <input 
                        type="text"
                        name="modelo"
                        class="form-control rounded-3 shadow-sm"
                        required
                    >

                </div>

            </div>

            <!-- Tercera fila -->
            <div class="row">

                <!-- Color -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Color
                    </label>

                    <input 
                        type="text"
                        name="color"
                        class="form-control rounded-3 shadow-sm"
                    >

                </div>

                <!-- Año -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Año
                    </label>

                    <select 
                        name="anio"
                        class="form-select rounded-3 shadow-sm"
                    >

                        <option value="">
                            Seleccione año
                        </option>

                        <?php for ($i = date("Y"); $i >= 1990; $i--): ?>

                            <option value="<?php echo $i; ?>">

                                <?php echo $i; ?>

                            </option>

                        <?php endfor; ?>

                    </select>

                </div>

                <!-- Cilindraje -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Cilindraje
                    </label>

                    <input 
                        type="text"
                        name="cilindraje"
                        class="form-control rounded-3 shadow-sm"
                    >

                </div>

            </div>

            <!-- Botón -->
            <button 
                type="submit"
                name="registrar"
                class="btn btn-primary"
            >

                <i class="bi bi-save-fill"></i>

                Guardar Moto

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