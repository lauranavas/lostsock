<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/tipoProducto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipoProducto = new TipoProducto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.


        switch ($_GET['action']) {
            case 'readAll': 
                if ($result['dataset'] = $tipoProducto->readAllTipoProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay tipo de productos registrados';
                }
                break;

            case 'create':
                $_POST = $tipoProducto->validateForm($_POST);
                if ($tipoProducto->setTipoProducto($_POST['tipoproducto'])) { 
                    if ($tipoProducto->createTipoProducto()) {
                        $result['status'] = 1;
                        $result['message'] = 'Tipo de producto creado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;

            case 'readOne':
                if ($tipoProducto->setIdTipoProducto($_POST['idtipoproducto'])) {
                    if ($result['dataset'] = $tipoProducto->readOneTipoProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Tipo de producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Tipo de producto incorrecto';
                }
                break;
            case 'update':
            $_POST = $tipoProducto->validateForm($_POST);
            if ($tipoProducto->setIdTipoProducto($_POST['idtipoproducto'])) {
                if ($data = $tipoProducto->readOneTipoProducto()) {
                    if ($tipoProducto->setTipoProducto($_POST['tipoproducto'])) {
                            if ( $tipoProducto->updateTipoProducto() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Tipo de producto actualizado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }

                    } else {
                        $result['exception'] = 'Nombre de tipo de producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Tipo de producto inexistente';
                }
            } else {
                $result['exception'] = 'Tipo de producto incorrecto';
            }
            break;
            case 'delete':
                if ($tipoProducto->setIdTipoProducto($_POST['idtipoproducto'])) {
                    if ($data = $tipoProducto->readOneTipoProducto()) {
                        if ($tipoProducto->deleteTipoProducto()) {
                            $result['status'] = 1;
                            $result['message'] = 'Tipo de producto eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Tipo de producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Tipo de producto incorrecto';
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