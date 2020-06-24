<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/categoria.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $categoria = new Categoria;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.


        switch ($_GET['action']) {
            case 'readAll': 
                if ($result['dataset'] = $categoria->readAllCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay categorías registradas';
                }
                break;

            case 'create':
                $_POST = $categoria->validateForm($_POST);
                if ($categoria->setCategoria($_POST['categoria'])) { 
                    if ($categoria->createCategoria()) {
                        $result['status'] = 1;
                        $result['message'] = 'Categoría creada correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;

            case 'readOne':
                if ($categoria->setIdCategoria($_POST['idcategoria'])) {
                    if ($result['dataset'] = $categoria->readOneCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'update':
            $_POST = $categoria->validateForm($_POST);
            if ($categoria->setIdCategoria($_POST['idcategoria'])) {
                if ($data = $categoria->readOneCategoria()) {
                    if ($categoria->setCategoria($_POST['categoria'])) {
                            if ( $categoria->updateCategoria() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Categoría actualizada correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }

                    } else {
                        $result['exception'] = 'Nombre de categoría incorrecto';
                    }
                } else {
                    $result['exception'] = 'Categoría inexistente';
                }
            } else {
                $result['exception'] = 'Categoría incorrecta';
            }
            break;
            case 'delete':
                if ($categoria->setIdCategoria($_POST['idcategoria'])) {
                    if ($data = $categoria->readOneCategoria()) {
                        if ($categoria->deleteCategoria()) {
                            $result['status'] = 1;
                            $result['message'] = 'Categoría eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
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