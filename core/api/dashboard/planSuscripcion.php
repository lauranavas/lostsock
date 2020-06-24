<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/planSuscripcion.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $plan = new PlanSuscripcion;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $plan->readAllPlanSuscripcion()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay planes registrados';
                }
                break;
            case 'create':
                $_POST = $plan->validateForm( $_POST );
                if ( $plan->setCantidadPares( $_POST[ 'cantidadpares' ] ) ) {
                    if ( $plan->setPrecio( $_POST[ 'precio' ] ) ) {
                        if ( $plan->createPlanSuscripcion() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Plan agregado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Precio ingresado no válido';
                    } 
                } else {
                    $result['exception'] = 'Cantidad de pares ingresado no válida';
                }
                break;
            case 'readOne':
                if ( $plan->setIdPlanSuscripcion( $_POST[ 'idplansuscripcion' ] ) ) {
                    if ( $result[ 'dataset' ] = $plan->readPlanSuscripcion() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Plan de suscripción no existente';
                    }
                } else {
                    $result['exception'] = 'Plan de suscripción no válido';
                }
                break;
            case 'update':
                $_POST = $plan->validateForm( $_POST );
                if ( $plan->setIdPlanSuscripcion( $_POST[ 'idplansuscripcion' ] ) ) {
                    if ( $plan->setCantidadPares( $_POST[ 'cantidadpares' ] ) ) {
                        if ( $plan->setPrecio( $_POST[ 'precio' ] ) ) {
                            if ( $plan->updatePlanSuscripcion() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Plan actualizado exitosamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Precio ingresado no válido';
                        } 
                    } else {
                        $result['exception'] = 'Cantidad de pares ingresado no válida';
                    }    
                } else {
                    $result['exception'] = 'Plan ingresado no válido';
                }
                break;
            case 'delete':
                if ( $plan->setIdPlanSuscripcion( $_POST[ 'idplansuscripcion' ] ) ) {
                    if ( $data = $plan->readPlanSuscripcion() ) {
                        if ( $plan->deletePlanSuscripcion() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Plan eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        
                    } else {
                        $result['exception'] = 'Plan inexistente';
                    }
                    
                } else {
                    $result['exception'] = 'Plan incorrecto';
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