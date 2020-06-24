// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_TALLA = '../../core/api/dashboard/talla.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_TALLA);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    if ($.fn.dataTable.isDataTable('#talla-table')) {
        $('#talla-table').DataTable().clear();
        $('#talla-table').DataTable().destroy();
    }
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
             <tr>
                <td>${row.talla}</td>
                <td>
                    <i class="fas fa-edit mx-1 text-warning" onclick="openUpdateModal(${row.idtalla})" data-toggle="tooltip" title="Editar"></i>
                    <i class="fas fa-trash-alt text-danger" onclick="openDeleteDialog(${row.idtalla})" data-toggle="tooltip" title="Eliminar"></i>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-rows').html(content);
    $('#talla-table').DataTable({
        'language': {
            'url': '../../core/helpers/Spanish.json',
            'search': 'Buscar talla:',

        }
    });
}

// Función que prepara formulario para insertar un registro.
function openCreateModal() {
    // Se limpian los campos del formulario.
    $('#talla-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#talla-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Agregar talla');

}

// Función que prepara formulario para modificar un registro.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#talla-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#talla-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Actualizar talla');

    $.ajax({
        dataType: 'json',
        url: API_TALLA + 'readOne',
        data: { idtalla: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#idtalla').val(response.dataset.idtalla);
                $('#talla').val(response.dataset.talla);
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
$('#talla-form').submit(function (event) {
    event.preventDefault();
    // Se llama a la función que crear o actualizar un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ($('#idtalla').val()) {
        saveRow(API_TALLA, 'update', this, 'talla-modal');
    } else {
        saveRow(API_TALLA, 'create', this, 'talla-modal');
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog(id) {
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idtalla: id };
    confirmDelete(API_TALLA, identifier);
}