

function showDelete() {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás deshacer esta acción",
        icon: 'warning',
        showCancelButton: true,
        focusCancel: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Eliminado',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
        }
    })
}

function showFinalize() {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás deshacer esta acción",
        icon: 'warning',
        showCancelButton: true,
        focusCancel: true,
        confirmButtonText: 'Finalizar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Finalizado',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
        }
    })
}

/*Para utilizar, agregar onclick="showDelete()" o onclick="showFinalize()" en el botón deseado. Voy a ir agregando 
más tipos (o los voy a modificar) a medida que avanzamos porque solo estos dos tipos se agregaron en los mockups.
También voy a trabajar con variables para el text para hacerlas más específicas.*/
