// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CATEGORIA = '../../core/api/dashboard/categoria.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_CATEGORIA);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    if ($.fn.dataTable.isDataTable('#categoria-table')) {
        $('#categoria-table').DataTable().clear();
        $('#categoria-table').DataTable().destroy();
    }
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
             <tr>
                <td>${row.categoria}</td>
                <td>
                    <i class="fas fa-edit mx-1 text-warning" onclick="openUpdateModal(${row.idcategoria})" data-toggle="tooltip" title="Editar"></i>
                    <i class="fas fa-trash-alt text-danger" onclick="openDeleteDialog(${row.idcategoria})" data-toggle="tooltip" title="Eliminar"></i>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-rows').html(content);
    $('#categoria-table').DataTable({
        'language': {
            'url': '../../core/helpers/Spanish.json',
            'search': 'Buscar categoría:',

        }
    });
}

// Función que prepara formulario para insertar un registro.
function openCreateModal() {
    // Se limpian los campos del formulario.
    $('#categoria-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#categoria-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Agregar categoría');

}

// Función que prepara formulario para modificar un registro.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#categoria-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#categoria-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Actualizar categoría');

    $.ajax({
        dataType: 'json',
        url: API_CATEGORIA + 'readOne',
        data: { idcategoria: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#idcategoria').val(response.dataset.idcategoria);
                $('#categoria').val(response.dataset.categoria);
            } else {
                sweetAlert(2, result.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}


// Evento para crear o modificar un registro.
$('#categoria-form').submit(function (event) {
    event.preventDefault();
    // Se llama a la función que crear o actualizar un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ($('#idcategoria').val()) {
        saveRow(API_CATEGORIA, 'update', this, 'categoria-modal');
    } else {
        saveRow(API_CATEGORIA, 'create', this, 'categoria-modal');
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog(id) {
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idcategoria: id };
    confirmDelete(API_CATEGORIA, identifier);
}