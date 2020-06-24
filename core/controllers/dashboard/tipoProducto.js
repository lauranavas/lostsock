// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_TIPOPRODUCTO = '../../core/api/dashboard/tipoproducto.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_TIPOPRODUCTO);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    if ($.fn.dataTable.isDataTable('#tipoproducto-table')) {
        $('#tipoproducto-table').DataTable().clear();
        $('#tipoproducto-table').DataTable().destroy();
    }
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
             <tr>
                <td>${row.tipo}</td>
                <td>
                    <i class="fas fa-edit mx-1 text-warning" onclick="openUpdateModal(${row.idtipoproducto})" data-toggle="tooltip" title="Editar"></i>
                    <i class="fas fa-trash-alt text-danger" onclick="openDeleteDialog(${row.idtipoproducto})" data-toggle="tooltip" title="Eliminar"></i>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-rows').html(content);
    $('#tipoproducto-table').DataTable({
        'language': {
            'url': '../../core/helpers/Spanish.json',
            'search': 'Buscar tipo de producto:',

        }
    });
}

// Función que prepara formulario para insertar un registro.
function openCreateModal() {
    // Se limpian los campos del formulario.
    $('#tipoproducto-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#tipoproducto-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Agregar tipo de producto');

}

// Función que prepara formulario para modificar un registro.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#tipoproducto-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#tipoproducto-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Actualizar tipo de producto');

    $.ajax({
        dataType: 'json',
        url: API_TIPOPRODUCTO + 'readOne',
        data: { idtipoproducto: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#idtipoproducto').val(response.dataset.idtipoproducto);
                $('#tipoproducto').val(response.dataset.tipo);
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
$('#tipoproducto-form').submit(function (event) {
    event.preventDefault();
    // Se llama a la función que crear o actualizar un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ($('#idtipoproducto').val()) {
        saveRow(API_TIPOPRODUCTO, 'update', this, 'tipoproducto-modal');
    } else {
        saveRow(API_TIPOPRODUCTO, 'create', this, 'tipoproducto-modal');
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog(id) {
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idtipoproducto: id };
    confirmDelete(API_TIPOPRODUCTO, identifier);
}