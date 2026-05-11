/*
|--------------------------------------------------------------------------
| Funciones JavaScript del sistema
|--------------------------------------------------------------------------
| Aquí se colocan funciones reutilizables.
*/

/*
|--------------------------------------------------------------------------
| Confirmar eliminación
|--------------------------------------------------------------------------
| Esta función muestra una alerta antes de eliminar un registro.
*/
function confirmarEliminacion(event) {

    // Evita que el enlace se ejecute inmediatamente
    event.preventDefault();

    // Obtener la URL del enlace
    const url = event.currentTarget.getAttribute("href");

    // Mostrar alerta de confirmación
    Swal.fire({
        title: "¿Estás seguro?",
        text: "El registro será eliminado del sistema",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {

        // Si el usuario confirma, se redirige a la URL de eliminación
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}