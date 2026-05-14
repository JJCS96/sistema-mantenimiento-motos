<?php

/*
|--------------------------------------------------------------------------
| Vista editar moto
|--------------------------------------------------------------------------
*/

require_once "../../models/Moto.php";
require_once "../../models/Cliente.php";

/*
|--------------------------------------------------------------------------
| Instanciar modelos
|--------------------------------------------------------------------------
*/

$modeloMoto = new Moto();

$modeloCliente = new Cliente();

/*
|--------------------------------------------------------------------------
| Obtener datos
|--------------------------------------------------------------------------
*/

$moto = $modeloMoto->obtenerPorId($_GET["id"]);

$clientes = $modeloCliente->obtenerTodos();

/*
|--------------------------------------------------------------------------
| Título
|--------------------------------------------------------------------------
*/

$titulo = "Editar Moto";

/*
|--------------------------------------------------------------------------
| Buffer
|--------------------------------------------------------------------------
*/

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>

        <i class="bi bi-pencil-square"></i>

        Editar Moto

    </h2>

    <a href="index.php" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Volver

    </a>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <form 
            action="../../controllers/MotoController.php"
            method="POST"
        >

            <!-- ID oculto -->
            <input 
                type="hidden"
                name="id_moto"
                value="<?php echo $moto['id_moto']; ?>"
            >

            <!-- Cliente -->
            <div class="mb-3">

                <label class="form-label">
                    Cliente propietario
                </label>

                <select 
                    name="id_cliente"
                    class="form-select rounded-3 shadow-sm"
                    required
                >

                    <?php foreach ($clientes as $cliente): ?>

                        <option 
                            value="<?php echo $cliente['id_cliente']; ?>"

                            <?php
                            if ($cliente['id_cliente'] == $moto['id_cliente']) {
                                echo "selected";
                            }
                            ?>
                        >

                            <?php

                            echo $cliente["nombres"] . " " .
                                 $cliente["apellidos"];

                            ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- Primera fila -->
            <div class="row">

                <!-- Placa -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Placa
                    </label>

                    <input 
                        type="text"
                        name="placa"
                        class="form-control rounded-3 shadow-sm"
                        value="<?php echo $moto['placa']; ?>"
                        required
                    >

                </div>

                <!-- Marca -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Marca
                    </label>

                    <input 
                        type="text"
                        name="marca"
                        class="form-control rounded-3 shadow-sm"
                        value="<?php echo $moto['marca']; ?>"
                        required
                    >

                </div>

            </div>

            <!-- Segunda fila -->
            <div class="row">

                <!-- Modelo -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Modelo
                    </label>

                    <input 
                        type="text"
                        name="modelo"
                        class="form-control rounded-3 shadow-sm"
                        value="<?php echo $moto['modelo']; ?>"
                        required
                    >

                </div>

                <!-- Color -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Color
                    </label>

                    <input 
                        type="text"
                        name="color"
                        class="form-control rounded-3 shadow-sm"
                        value="<?php echo $moto['color']; ?>"
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

                        <?php for ($i = date("Y"); $i >= 1990; $i--): ?>

                            <option 
                                value="<?php echo $i; ?>"

                                <?php
                                if ($moto['anio'] == $i) {
                                    echo "selected";
                                }
                                ?>
                            >

                                <?php echo $i; ?>

                            </option>

                        <?php endfor; ?>

                    </select>

                </div>

            </div>

            <!-- Cilindraje -->
            <div class="mb-3">

                <label class="form-label">
                    Cilindraje
                </label>

                <input 
                    type="text"
                    name="cilindraje"
                    class="form-control rounded-3 shadow-sm"
                    value="<?php echo $moto['cilindraje']; ?>"
                >

            </div>

            <!-- Botón -->
            <button 
                type="submit"
                name="actualizar"
                class="btn btn-warning"
            >

                <i class="bi bi-save-fill"></i>

                Actualizar Moto

            </button>

        </form>

    </div>

</div>

<?php

$contenido = ob_get_clean();

include "../layouts/app.php";

?>