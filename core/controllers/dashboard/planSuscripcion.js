// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PLANSUSCRIPCION = '../../core/api/dashboard/planSuscripcion.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de tipos de usuario. Se ubica en el archivo account.js
    readRows( API_PLANSUSCRIPCION );
});

function fillTable( dataset )
{
    if ($.fn.dataTable.isDataTable('#myTable')) {
        $('#myTable').DataTable().clear();
        $('#myTable').DataTable().destroy();
    }
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td class="pl-4">${row.cantidadpares} pares</td>
                <td>$${row.precio}</td>
                <td>
                    <i class="fas fa-edit mx-1 text-warning" onclick="openUpdateModal(${row.idplansuscripcion})" data-toggle="tooltip" title="Editar"></i>
                    <i class="fas fa-trash-alt text-danger" onclick="openDeleteDialog(${row.idplansuscripcion})" data-toggle="tooltip" title="Eliminar"></i>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
    $( '#myTable' ).DataTable({
        'language': {
            'url': '../../core/helpers/Spanish.json'
        }
    });
}

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Agregar plan de suscripción' );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Actualizar plan de suscripción' );

    $.ajax({
        dataType: 'json',
        url: API_PLANSUSCRIPCION + 'readOne',
        data: { idplansuscripcion: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#idplansuscripcion' ).val( response.dataset.idplansuscripcion );
            $( '#cantidadpares' ).val( response.dataset.cantidadpares );
            $( '#precio' ).val( response.dataset.precio );
        } else {
            sweetAlert( 2, result.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Evento para crear o modificar un registro.
$( '#save-form' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crear o actualizar un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#idplansuscripcion' ).val() ) {
        saveRow( API_PLANSUSCRIPCION, 'update', this, 'save-modal' );
    } else {
        saveRow( API_PLANSUSCRIPCION, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idplansuscripcion: id };
    confirmDelete( API_PLANSUSCRIPCION, identifier );
}