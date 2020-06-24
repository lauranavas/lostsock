<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/frecuencia.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $frecuencia = new Frecuencia;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $frecuencia->readAllFrecuencia()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay frecuencias de envío registrados';
                }
                break;
            case 'create':
                $_POST = $frecuencia->validateForm( $_POST );
                if ( $frecuencia->setFrecuencia( $_POST[ 'frecuencia' ] ) ) {
                    if ( $frecuencia->createFrecuencia() ) {
                        $result['status'] = 1;
                        $result['message'] = 'frecuencia de envío agregado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Frecuencia ingresada no válida';
                }
                break;
            case 'readOne':
                if ( $frecuencia->setIdFrecuencia( $_POST[ 'idfrecuencia' ] ) ) {
                    if ( $result[ 'dataset' ] = $frecuencia->readFrecuencia() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Frecuencia de envío no existente';
                    }
                } else {
                    $result['exception'] = 'Frecuencia de envío no válida';
                }
                break;
            case 'update':
                $_POST = $frecuencia->validateForm( $_POST );
                if ( $frecuencia->setIdFrecuencia( $_POST[ 'idfrecuencia' ] ) ) {
                    if ( $frecuencia->setFrecuencia( $_POST[ 'frecuencia' ] ) ) {
                        if ( $frecuencia->updateFrecuencia() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Frecuencia de envío actualizada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Ingresa una frecuencia válida';
                    }    
                } else {
                    $result['exception'] = 'Frecuencia ingresada no válida';
                }
                break;
            case 'delete':
                if ( $frecuencia->setIdFrecuencia( $_POST[ 'idfrecuencia' ] ) ) {
                    if ( $data = $frecuencia->readFrecuencia() ) {
                        if ( $frecuencia->deleteFrecuencia() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Frecuencia de envío eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        
                    } else {
                        $result['exception'] = 'Frecuencia de envío inexistente';
                    }
                    
                } else {
                    $result['exception'] = 'Frecuencia de envío incorrecta';
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