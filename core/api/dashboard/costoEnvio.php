<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/costoEnvio.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $costoEnvio = new CostoEnvio;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $costoEnvio->readAllDepartamento()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay departamentos registrados';
                }
                break;
            case 'create':
                $_POST = $costoEnvio->validateForm( $_POST );
                if ( $costoEnvio->setDepartamento( $_POST[ 'departamento' ] ) ) {
                    if ( $costoEnvio->setCostoEnvio( $_POST[ 'costoenvio' ] ) ) {
                        if ( $costoEnvio->createDepartamento() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Departamento agregado exitosamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Costo ingresado no válido';
                    } 
                } else {
                    $result['exception'] = 'Departamento ingresado no válido';
                }
                break;
            case 'readOne':
                if ( $costoEnvio->setIdDepartamento( $_POST[ 'iddepartamento' ] ) ) {
                    if ( $result[ 'dataset' ] = $costoEnvio->readDepartamento() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Departamento no existente';
                    }
                } else {
                    $result['exception'] = 'Costo de envío no válido';
                }
                break;
            case 'update':
                $_POST = $costoEnvio->validateForm( $_POST );
                if ( $costoEnvio->setIdDepartamento( $_POST[ 'iddepartamento' ] ) ) {
                    if ( $costoEnvio->setDepartamento( $_POST[ 'departamento' ] ) ) {
                        if ( $costoEnvio->setCostoEnvio( $_POST[ 'costoenvio' ] ) ) {
                            if ( $costoEnvio->updateDepartamento() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Costo de envío actualizado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Costo ingresado no válido';
                        } 
                    } else {
                        $result['exception'] = 'Departamento ingresado no válido';
                    }    
                } else {
                    $result['exception'] = 'Departamento ingresado no válido';
                }
                break;
            case 'delete':
                if ( $costoEnvio->setIdDepartamento( $_POST[ 'iddepartamento' ] ) ) {
                    if ( $data = $costoEnvio->readDepartamento() ) {
                        if ( $costoEnvio->deleteCostoEnvio() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Costo de envío eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        
                    } else {
                        $result['exception'] = 'Departamento inexistente';
                    }
                    
                } else {
                    $result['exception'] = 'Departamento incorrecto';
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