<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/color.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $color = new Color;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.


        switch ($_GET['action']) {
            case 'readAll': 
                if ($result['dataset'] = $color->readAllColor()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay colores registrados';
                }
                break;

            case 'create':
                $_POST = $color->validateForm($_POST);
                if ($color->setColor($_POST['color'])) { 
                    if ($color->createColor()) {
                        $result['status'] = 1;
                        $result['message'] = 'Color creado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;

            case 'readOne':
                if ($color->setIdColor($_POST['idcolor'])) {
                    if ($result['dataset'] = $color->readOneColor()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Color inexistente';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'update':
            $_POST = $color->validateForm($_POST);
            if ($color->setIdColor($_POST['idcolor'])) {
                if ($data = $color->readOneColor()) {
                    if ($color->setColor($_POST['color'])) {
                            if ( $color->updateColor() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Color actualizado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }

                    } else {
                        $result['exception'] = 'Nombre de color incorrecto';
                    }
                } else {
                    $result['exception'] = 'Color inexistente';
                }
            } else {
                $result['exception'] = 'Color incorrecto';
            }
            break;
            case 'delete':
                if ($color->setIdColor($_POST['idcolor'])) {
                    if ($data = $color->readOneColor()) {
                        if ($color->deleteColor()) {
                            $result['status'] = 1;
                            $result['message'] = 'Color eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Color inexistente';
                    }
                } else {
                    $result['exception'] = 'Color incorrecto';
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