// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_SUSCRIPCION = '../../core/api/dashboard/suscripcion.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_SUSCRIPCION);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
  if ($.fn.dataTable.isDataTable('#suscripcion-table')) {
      table = $('#suscripcion-table').DataTable();
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
                <td>${row.categoria}</td>
                <td>${row.tipo}</td>
                <td>${row.talla}</td>
                <td>${row.frecuencia}</td>
                <td>
                    <div>${row.nombres} ${row.apellidos}</div>
                </td>
                <td> ${row.detalledireccion}</td>
                <td>${txt}</td>
                <td>
                    <i class="fas fa-info mx-1 text-info" onclick="openUpdateModal(${row.idsuscripcion})" data-toggle="tooltip" title="Más información"></i>
                    <i class="fas ${row.estado == 1 ? "fa-eye-slash" : "fa-eye"} mx-1 text-danger" onclick="updateEstado(${+!(Number(row.estado))}, ${row.idsuscripcion})" data-toggle="tooltip" title="Estado"></i>
                </td>
            </tr>
        `;
    });
    $('#tbody-rows').html(content);
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.

      $('#suscripcion-table').DataTable({
          responsive: true,
          language: {
              'url': '../../core/helpers/Spanish.json',
              'search': 'Buscar suscripción:',

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
    // $('#modal-title').text('Suscripción');
// }

// Función que prepara formulario para modificar un registro.
function updateEstado(estado, id) {
    $.ajax({
      dataType: 'json',
      url: API_SUSCRIPCION + 'status',
      data: { estado: estado , id: id},
      type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
              sweetAlert(1, response.message, null);
              readRows(API_SUSCRIPCION);
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
function openUpdateModal(id) {
  // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#suscripcion-form')[0].reset();
    $('#suscripcion-modal').modal('show');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Suscripción');

    $.ajax({
        dataType: 'json',
        url: API_SUSCRIPCION + 'readOne',
        data: { idsuscripcion: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#nombres').val(response.dataset.nombres);
                $('#apellidos').val(response.dataset.apellidos);
                $('#detalledireccion').val(response.dataset.detalledireccion);
                $('#detalledepartamentoo').val(response.dataset.departamento);
                $('#frecuencia').val(response.dataset.frecuencia);
                $('#costoenvio').val(response.dataset.costoenvio);
                $('#tipoproducto').val(response.dataset.tipo);
                $('#categoria').val(response.dataset.categoria);
                $('#estado').val(+response.dataset.estado ? 'Activo' : 'Inactivo');
                $('#talla').val(response.dataset.talla);
                $('#cantidad').val(response.dataset.cantidadpares);
                $('#precio').val(response.dataset.precio);
                $('#total').val((+response.dataset.precio + +response.dataset.costoenvio));

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

// Evento para crear o modificar un registro.
$('#categoria-form').submit(function (event) {
    event.preventDefault();
    // Se llama a la función que crear o actualizar un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ($('#idcategoria').val()) {
        saveRow(API_SUSCRIPCION, 'update', this, 'categoria-modal');
    } else {
        saveRow(API_SUSCRIPCION, 'create', this, 'categoria-modal');
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog(id) {
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idcategoria: id };
    confirmDelete(API_SUSCRIPCION, identifier);
}