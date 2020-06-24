// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_ORDEN = '../../core/api/dashboard/orden.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_ORDEN);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    if ($.fn.dataTable.isDataTable('#orden-table')) {
        table = $('#orden-table').DataTable();
        table.clear();
        table.destroy();
    }
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se establece un icono para el estado del producto.
        // (row.estado == 1) ? txt = 'Activo' : txt = 'Inactivo';
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.idcompra}</td>
                <td>
                    <div>${row.nombre}</div>
                </td>
                <td>
                    <div>${row.fechacompra}</div>
                    <div>${row.fechaenvio}</div>
                </td>
                <td>${row.total}</td>
                <td>${row.estado}</td>
                <td>
                    <div>${row.nombres}</div>
                    <div>${row.apellidos}</div>
                </td>
                <td>
                    <!--<i class="fas fa-info mx-1 text-info" onclick="openOrden(${row.idcompra})" data-toggle="tooltip" title="Más información"></i>-->
                    <i class="fas ${row.estado == 'En proceso' ? "fa-eye-slash" : "fa-eye"} mx-1 text-danger" onclick="updateEstado(${!(row.estado == 'En proceso')}, ${row.idcompra})"  data-toggle="tooltip" title="Estado"></i>
                </td>
            </tr>
        `;
    });
    $('#tbody-rows').html(content);
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.

    $('#orden-table').DataTable({
        responsive: true,
        language: {
            'url': '../../core/helpers/Spanish.json',
            'search': 'Buscar órdenes:',

        }
    });

}

// Función que prepara formulario para modificar un registro.
function updateEstado(estado, id) {
    $.ajax({
        dataType: 'json',
        url: API_ORDEN + 'status',
        data: { estado: estado ? 1 : 2 , id: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, null);
                readRows(API_ORDEN);
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


