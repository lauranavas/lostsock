// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTO = '../../core/api/dashboard/producto.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de administradores. Se ubica en el archivo account.js
    /*$('#pagination-demo').twbsPagination({
        totalPages: 35,
        visiblePages: 7,
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });*/

    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams( location.search );
    // Se obtienen los datos localizados por medio de las variables.
    const ID = params.get( 'id' );
    // Se llama a la función que muestra el detalle del producto seleccionado previamente.
    readComentarios( ID );
});

function readComentarios( id )
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'readComentarios',
        data: { idproducto: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            let content = '';
            // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                content += `
                    <div class="media border p-3 mb-3">
                        <img src="../../resources/img/clientes/default.png" alt="John Doe" class="mr-3 rounded-circle img-avatar">
                        <div class="media-body">
                            <h4>${row.nombres} ${row.apellidos} <small><i>Publicado el ${row.fecha}</i></small> <i class="fas ${row.estado == 1 ? "fa-eye-slash" : "fa-eye"} mx-1 text-danger" onclick="updateEstado(${+!(Number(row.estado))}, ${row.idcomentario})"  data-toggle="tooltip" title="Estado"></i></h4>
                            <p>${row.comentario}</p>
                        </div>
                    </div>
                `;
            });
            // Se agregan los comentarios al contenido de la página
            $( '#page-content' ).html( content );
        } else {
            sweetAlert( 4, response.exception, null );
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

// Función para establecer el registro a eliminar mediante el id recibido.
function updateEstado(estado, id) {
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'estadoComentario',
        data: { estado: estado, id: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, null);
                const ID = params.get( 'id' );
                readComentarios( ID );
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