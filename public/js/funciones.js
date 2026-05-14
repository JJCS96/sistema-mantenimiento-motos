/*
|--------------------------------------------------------------------------
| Funciones generales del sistema
|--------------------------------------------------------------------------
| Este archivo contiene:
| - Alertas
| - Confirmaciones
| - Eventos generales del sistema
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Esperar carga completa del DOM
|--------------------------------------------------------------------------
*/

document.addEventListener("DOMContentLoaded", function () {

    /*
    |--------------------------------------------------------------------------
    | ELIMINAR CLIENTES
    |--------------------------------------------------------------------------
    */

    const botonesEliminar = document.querySelectorAll(".btn-eliminar");

    botonesEliminar.forEach(boton => {

        boton.addEventListener("click", function () {

            const id = this.dataset.id;

            Swal.fire({

                title: "¿Eliminar cliente?",
                text: "Esta acción no se puede deshacer",
                icon: "warning",

                showCancelButton: true,

                confirmButtonColor: "#dc3545",

                cancelButtonColor: "#6c757d",

                confirmButtonText: "Sí, eliminar",

                cancelButtonText: "Cancelar"

            }).then((result) => {

                if (result.isConfirmed) {

                    window.location.href =
                        "../../controllers/ClienteController.php?eliminar=" + id;
                }

            });

        });

    });

    /*
    |--------------------------------------------------------------------------
    | ELIMINAR MOTOS
    |--------------------------------------------------------------------------
    */

    const botonesEliminarMoto = document.querySelectorAll(
        ".btn-eliminar-moto"
    );

    botonesEliminarMoto.forEach(boton => {

        boton.addEventListener("click", function () {

            const id = this.dataset.id;

            Swal.fire({

                title: "¿Eliminar moto?",
                text: "Esta acción no se puede deshacer",
                icon: "warning",

                showCancelButton: true,

                confirmButtonColor: "#dc3545",

                cancelButtonColor: "#6c757d",

                confirmButtonText: "Sí, eliminar",

                cancelButtonText: "Cancelar"

            }).then((result) => {

                if (result.isConfirmed) {

                    window.location.href =
                        "../../controllers/MotoController.php?eliminar=" + id;
                }

            });

        });

    });


    /*
|--------------------------------------------------------------------------
| ELIMINAR MANTENIMIENTOS
|--------------------------------------------------------------------------
*/

const botonesEliminarMantenimiento = document.querySelectorAll(
    ".btn-eliminar-mantenimiento"
);

botonesEliminarMantenimiento.forEach(boton => {

    boton.addEventListener("click", function () {

        const url = this.dataset.url;

        Swal.fire({
            title: "¿Eliminar mantenimiento?",
            text: "Esta acción no se puede deshacer",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {

            if (result.isConfirmed) {
                window.location.href = url;
            }

        });

    });

});




/*
|--------------------------------------------------------------------------
| ELIMINAR REPUESTOS
|--------------------------------------------------------------------------
*/

const botonesEliminarRepuesto = document.querySelectorAll(
    ".btn-eliminar-repuesto"
);

botonesEliminarRepuesto.forEach(boton => {

    boton.addEventListener("click", function () {

        const url = this.dataset.url;

        Swal.fire({

            title: "¿Eliminar repuesto?",
            text: "Esta acción no se puede deshacer",
            icon: "warning",

            showCancelButton: true,

            confirmButtonColor: "#dc3545",

            cancelButtonColor: "#6c757d",

            confirmButtonText: "Sí, eliminar",

            cancelButtonText: "Cancelar"

        }).then((result) => {

            if (result.isConfirmed) {

                window.location.href = url;
            }

        });

    });

});





});