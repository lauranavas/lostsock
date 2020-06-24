/*
*   Este controlador es de uso general en las páginas web del sitio privado. Se importa en la plantilla del pie del documento.
*   Sirve para manejar todo lo que tiene que ver con la cuenta del usuario.
*/

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../core/api/dashboard/administrador.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de administradores. Se ubica en el archivo account.js
    loadProfile();
});

function checkAdministradores(){
    $.ajax({
        dataType: 'json',
        url: API + 'readAll'
    })
    .done( function( response ){
        // Se obtiene la ruta del documento en el servidor web.
        let current = window.location.pathname;
        // Se comprueba si la página web actual es register.php, de lo contrario seria index.php
        if ( current == '/lost-sock/views/dashboard/signin.php' ) {
            // Si ya existe un usuario registrado se envía a iniciar sesión, de lo contrario se pide crear el primero.
            if ( response.status ) {
                sweetAlert( 3, response.message, 'index.php' );
            } else {
                sweetAlert( 4, 'Debe crear un usuario para comenzar', null );
            }
        } else {
            // Si ya existe al menos un usuario registrado se pide iniciar sesión, de lo contrario se envía a crear el primero.
            if ( response.status ) {
                sweetAlert( 4, 'Debe autenticarse para ingresar', null );
            } else {
                sweetAlert( 3, response.exception, 'signin.php' );
            }
        }
    } )
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Función para cerrar la sesión del usuario. Requiere el archivo sweetalert.min.js para funcionar.
function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Estas seguro que deseas cerrar sesión?',
        icon: 'warning',
        buttons: [ 'Cancelar', 'Aceptar' ],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Aceptar para hacer la petición de cerrar sesión, de lo contrario se continua con la sesión actual.
        if ( value ) {
            $.ajax({
                dataType: 'json',
                url: API + 'logout'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    sweetAlert( 1, response.message, 'index.php' );
                } else {
                    sweetAlert( 2, response.exception, null );
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
        } else {
            sweetAlert( 4, 'Puede continuar con la sesión', null );
        }
    });
}

function loadProfile(){
    let current = window.location.pathname;
    if ( current == '/lost-sock/views/dashboard/admin-settings.php' ) {
        $( '#profile-form' )[0].reset();
        $( '#password-form' )[0].reset();
        $.ajax({
            dataType: 'json',
            url: API + 'readProfile'
        })
        .done(function( response ){
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if ( response.status ) {
                // Se inicializan los campos del formulario con los datos del usuario que ha iniciado sesión.
                $( '#nombres' ).val( response.dataset.nombres );
                $( '#apellidos' ).val( response.dataset.apellidos );
                $( '#email' ).val( response.dataset.email );
                $( '#usuario' ).val( response.dataset.usuario );
            } else {
                sweetAlert( 2, response.exception, null );
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
}

// Evento para editar el perfil del usuario que ha iniciado sesión.
$( '#profile-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'editProfile',
        data: $( '#profile-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, 'admin-settings.php' );
        } else {
            sweetAlert( 2, response.exception, null );
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
});

// Evento para cambiar la contraseña del usuario que ha iniciado sesión.
$( '#password-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'changePassword',
        data: $( '#password-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            $( '#password-form' )[0].reset();
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
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
});