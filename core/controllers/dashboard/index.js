// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_ADMINISTRADOR = '../../core/api/dashboard/administrador.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de administradores. Se ubica en el archivo account.js
    checkAdministradores();
});

// Evento que valida al administrador al presionar el botón de iniciar sesión.
$( '#login-form' ).submit( function( event ){
    // Se evita recargar la página web de enviar formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_ADMINISTRADOR + 'login',
        data: $( '#login-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, 'dashboard.php' );
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