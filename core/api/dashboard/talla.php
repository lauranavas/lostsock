<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/talla.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $talla = new Talla;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.


        switch ($_GET['action']) {
            case 'readAll': 
                if ($result['dataset'] = $talla->readAllTalla()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay tallas registradas';
                }
                break;


            case 'create':
                $_POST = $talla->validateForm($_POST);
                if ($talla->setTalla($_POST['talla'])) { 
                    if ($talla->createTalla()) {
                        $result['status'] = 1;
                        $result['message'] = 'Talla creada correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;

            case 'readOne':
                if ($talla->setIdTalla($_POST['idtalla'])) {
                    if ($result['dataset'] = $talla->readOneTalla()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Talla inexistente';
                    }
                } else {
                    $result['exception'] = 'Talla incorrecta';
                }
                break;
            case 'update':
            $_POST = $talla->validateForm($_POST);
            if ($talla->setIdTalla($_POST['idtalla'])) {
                if ($data = $talla->readOneTalla()) {
                    if ($talla->setTalla($_POST['talla'])) {
                            if ( $talla->updateTalla() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Talla actualizada correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }

                    } else {
                        $result['exception'] = 'Nombre de talla incorrecto';
                    }
                } else {
                    $result['exception'] = 'Talla inexistente';
                }
            } else {
                $result['exception'] = 'Talla incorrecta';
            }
            break;
            case 'delete':
                if ($talla->setIdTalla($_POST['idtalla'])) {
                    if ($data = $talla->readOneTalla()) {
                        if ($talla->deleteTalla()) {
                            $result['status'] = 1;
                            $result['message'] = 'Talla eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Talla inexistente';
                    }
                } else {
                    $result['exception'] = 'Talla incorrecta';
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