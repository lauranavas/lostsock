// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTE = '../../core/api/dashboard/cliente.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_CLIENTE);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    if ($.fn.dataTable.isDataTable('#cliente-table')) {
        table = $('#cliente-table').DataTable();
        table.clear();
        table.destroy();
    }
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se establece un icono para el estado del producto.
        (row.estado == 1) ? txt = 'Activo' : txt = 'Inactivo';
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>
                    <div>${row.nombres} ${row.apellidos}</div>
                </td>
                <td>${row.email}</td>
                <td>${row.telefono}</td>
                <td>${row.usuario}</td>
                <td>${txt}</td>
                <td>
                    <i class="fas fa-info mx-1 text-info" onclick="openSuscripciones(${row.idcliente})" data-toggle="tooltip" title="Más información"></i>
                    <i class="fas ${row.estado == 1 ? "fa-eye-slash" : "fa-eye"} mx-1 text-danger" onclick="updateEstado(${+!(Number(row.estado))}, ${row.idcliente})"  data-toggle="tooltip" title="Estado"></i>
                </td>
            </tr>
        `;
    });
    $('#tbody-rows').html(content);
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.

    $('#cliente-table').DataTable({
        responsive: true,
        language: {
            'url': '../../core/helpers/Spanish.json',
            'search': 'Buscar cliente:',

        }
    });

}

// Función que prepara formulario para insertar un registro.
// function openCreateModal() {
    // Se limpian los campos del formulario.
    // $('#categoria-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    // $('#categoria-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    // $('#modal-title').text('clientees del cliente');
// }

// Función que prepara formulario para modificar un registro.
function updateEstado(estado, id) {
    $.ajax({
        dataType: 'json',
        url: API_CLIENTE + 'status',
        data: { estado: estado, id: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, null);
                readRows(API_CLIENTE);
            } else {
                sweetAlert(2, response.exception, null);
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
function openSuscripciones(id) {
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#tbody-suscripcion-rows').html('');
    $('#cliente-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Suscripciones');

    $.ajax({
        dataType: 'json',
        url: API_CLIENTE + 'readSuscripciones',
        data: { idcliente: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                let content = '';
                // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    content += `
                        <tr>
                            <td>${row.categoria}</td>
                            <td>${row.tipo}</td>
                            <td>${row.talla}</td>
                            <td>${row.frecuencia}</td>
                            <td>${(row.precio * 1) + (row.costoenvio * 1)} </td>
                        </tr>
                    `;
                });
                $('#tbody-suscripcion-rows').html(content);
                // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.

            } else {
                $('#tbody-suscripcion-rows').html('No hay registros');
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
        saveRow(API_CLIENTE, 'update', this, 'categoria-modal');
    } else {
        saveRow(API_CLIENTE, 'create', this, 'categoria-modal');
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog(id) {
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idcategoria: id };
    confirmDelete(API_CLIENTE, identifier);
}