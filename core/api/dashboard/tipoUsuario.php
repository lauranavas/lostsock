<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/tipoUsuario.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipo = new TipoUsuario;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $tipo->readAllTipos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay tipos de usuarios registrados';
                }
                break;
            case 'create':
                $_POST = $tipo->validateForm( $_POST );
                if ( $tipo->setTipo( $_POST[ 'tipo' ] ) ) {
                    if ( $tipo->createTipoUsuario() ) {
                        $result['status'] = 1;
                        $result['message'] = 'Tipo de usuario agregado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Tipo de usuario ingresado no válido';
                }
                break;
            case 'readOne':
                if ( $tipo->setId( $_POST[ 'idtipousuario' ] ) ) {
                    if ( $result[ 'dataset' ] = $tipo->readTipo() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Tipo de usuario no existente';
                    }
                } else {
                    $result['exception'] = 'Tipo de usuario no válido';
                }
                break;
            case 'update':
                $_POST = $tipo->validateForm( $_POST );
                if ( $tipo->setId( $_POST[ 'idtipousuario' ] ) ) {
                    if ( $tipo->setTipo( $_POST[ 'tipo' ] ) ) {
                        if ( $tipo->updateTipo() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Tipo de usuario actualizado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Ingresa un nombre válido';
                    }    
                } else {
                    $result['exception'] = 'Tipo de usuario ingresado no válido';
                }
                break;
            case 'delete':
                if ( $tipo->setId( $_POST[ 'idtipousuario' ] ) ) {
                    if ( $data = $tipo->readTipo() ) {
                        if ( $tipo->deleteTipo() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Tipo de usuario eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        
                    } else {
                        $result['exception'] = 'Tipo de usuario inexistente';
                    }
                    
                } else {
                    $result['exception'] = 'Tipo de usuario incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}
?>