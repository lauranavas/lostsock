// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_ADMINISTRADOR = '../../core/api/dashboard/administrador.php?action=';
const API_TIPOUSUARIO = '../../core/api/dashboard/tipoUsuario.php?action=readAll';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de administradores. Se ubica en el archivo account.js
    readRows( API_ADMINISTRADOR );
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
        // Se establece un icono para el estado del producto.
        ( row.estado == 1 ) ? txt = 'Activo' : txt = 'Inactivo';
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>
                    <div>${row.nombres} ${row.apellidos}</div>
                    <div>${row.email}</div>
                </td>
                <td>${row.usuario}</td>
                <td>${row.tipo}</td>
                <td>${txt}</td>
                <td>
                    <i class="fas fa-edit mx-1" onclick="openUpdateModal(${row.idadministrador})"></i>
                    <i class="fas fa-trash-alt" onclick="openDeleteDialog(${row.idadministrador})"></i>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
    $( '#myTable' ).DataTable({
        'language': {
            'url': '../../core/helpers/Spanish.json' ,
            'search': 'Buscar administrador:' ,
            
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
    $( '#modal-title' ).text( 'Agregar administrador' );
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#foto_administrador' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
    fillSelect( API_TIPOUSUARIO, 'tipo_administrador', null );
    $( '#estado' ).addClass( 'd-none' );
    $( '#lblE' ).addClass( 'd-none' );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Actualizar administrador' );
    // Se establece el campo de tipo archivo como opcional.
    // $( '#archivo_producto' ).prop( 'required', false );

    $.ajax({
        dataType: 'json',
        url: API_ADMINISTRADOR + 'readOne',
        data: { idadministrador: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#idadministrador' ).val( response.dataset.idadministrador );
            $( '#nombres' ).val( response.dataset.nombres );
            $( '#apellidos' ).val( response.dataset.apellidos );
            $( '#email' ).val( response.dataset.email );
            $( '#usuario' ).val( response.dataset.usuario );
            fillSelect( API_TIPOUSUARIO, 'tipo_administrador', response.dataset.idtipousuario );
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            llenarEstado( 'estado', response.dataset.estado );
            //M.updateTextFields();
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

function llenarEstado( selectId, estado ){
    let content;
    if ( estado == 1 ) {
        content+=  `
            <option value="1" selected>Activo</option>
            <option value="0">Inactivo</option>
        `;
    } else {
        content+=  `
            <option value="1">Activo</option>
            <option value="0" selected>Inactivo</option>
        `;
    }
    $( '#' + selectId ).html( content );
}

// Evento para crear o modificar un registro.
$( '#save-form' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crear o actualizar un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#idadministrador' ).val() ) {
        saveRow( API_ADMINISTRADOR, 'update', this, 'save-modal' );
    } else {
        saveRow( API_ADMINISTRADOR, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idadministrador: id };
    confirmDelete( API_ADMINISTRADOR, identifier );
}