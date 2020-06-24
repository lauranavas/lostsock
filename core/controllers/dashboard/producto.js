// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTO = '../../core/api/dashboard/producto.php?action=';
const API_CATEGORIA = '../../core/api/dashboard/categoria.php?action=readAll';
const API_TIPOPRODUCTO = '../../core/api/dashboard/tipoProducto.php?action=readAll';
const API_DETALLEPRODUCTO = '../../core/api/dashboard/detalleProducto.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de administradores. Se ubica en el archivo account.js
    readRows( API_PRODUCTO );
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
                <td><img src="../../resources/img/producto/${row.imagen}" alt="${row.imagen}" class="mr-3 rounded-circle img-avatar"></td>
                <td>${row.nombre}</td>
                <td>${row.descripcion}</td>
                <td>
                    <div>$${row.precio}</div>
                    <div>${row.descuento}%</div>
                </td>
                <td>${row.categoria}</td>
                <td>${row.tipo}</td>
                <td><a class="text-success" href="#" onclick="openExistModal(${row.idproducto})">Ver existencias</a></td>
                <td>
                    <a href="comentarios.php?id=${row.idproducto}"><i class="fas fa-comments" data-toggle="tooltip" title="Comentarios"></i></a>
                    <i class="fas fa-edit mx-1 text-warning" onclick="openUpdateModal(${row.idproducto})" data-toggle="tooltip" title="Editar"></i>
                    <i class="fas fa-trash-alt text-danger" onclick="openDeleteDialog(${row.idproducto})" data-toggle="tooltip" title="Eliminar"></i>
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
    $( '#modal-title' ).text( 'Agregar producto' );
    // Se establece el campo de tipo archivo como obligatorio.
    $( '#imagen' ).prop( 'required', true );
    // Se llama a la función que llenar los select del formulario. Se encuentra en el archivo components.js
    fillSelect( API_CATEGORIA, 'categoria_producto', null );
    fillSelect( API_TIPOPRODUCTO, 'tipo_producto', null );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Actualizar producto' );
    // Se establece el campo de tipo archivo como opcional.
    $( '#imagen' ).prop( 'required', false );

    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'readOne',
        data: { idproducto: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#idproducto' ).val( response.dataset.idproducto );
            $( '#nombre' ).val( response.dataset.nombre );
            $( '#descripcion' ).val( response.dataset.descripcion );
            $( '#precio' ).val( response.dataset.precio );
            $( '#descuento' ).val( response.dataset.descuento );
            fillSelect( API_CATEGORIA, 'categoria_producto', response.dataset.idcategoria );
            fillSelect( API_TIPOPRODUCTO, 'tipo_producto', response.dataset.idtipoproducto );
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
    if ( $( '#idproducto' ).val() ) {
        saveRow( API_PRODUCTO, 'update', this, 'save-modal' );
    } else {
        saveRow( API_PRODUCTO, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { idproducto: id };
    confirmDelete( API_PRODUCTO, identifier );
}


// Función para ver existencias
function openExistModal( id ){
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#existencias-modal' ).modal( 'show' );

    $.ajax({
        dataType: 'json',
        url: API_DETALLEPRODUCTO + 'readOne',
        data: { idproductoe: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#idproductoe' ).val( id );
            let content = '';
            // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                content += `
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="i${row.iddetalleproducto}">${row.talla}</span>
                        </div>
                        <input type="text" class="form-control" value="${row.existencia}" aria-describedby="i${row.iddetalleproducto}" name="${row.iddetalleproducto}">
                    </div>
                `;
            });
            // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
            $( '#existencias-body' ).html( content );
    
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

// Evento que valida al administrador al presionar el botón de iniciar sesión.
$( '#existencias-form' ).submit( function( event ){
    // Se evita recargar la página web de enviar formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_DETALLEPRODUCTO + 'update',
        data: $( '#existencias-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, null );
            // Se cierra la caja de dialogo (modal) donde está el formulario.
            $( '#existencias-modal' ).modal( 'hide' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail( function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    })
});