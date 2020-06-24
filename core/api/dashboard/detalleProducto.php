<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/detalleProducto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $dP = new DetalleProducto; // "dp" abreviación de detalle Producto
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                break;
            case 'create':
                break;
            case 'readOne':
                if ( $dP->setIdProducto( $_POST[ 'idproductoe' ] ) ) {
                    if ($result['dataset'] = $dP->readDetalleProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay detalles registrados para este producto';
                    }
                } else {
                    $result['exception'] = 'Detalle de producto no válido';
                }
                break;
            case 'update':
                $_POST = $dP->validateForm( $_POST );
                if ( $dP->setIdProducto( $_POST[ 'idproductoe' ] ) ) {
                    if ( $data = $dP->readAllDetalleProducto() ) {
                        foreach ($data as $v1) {
                            foreach ($v1 as $v2) {
                                if ( $dP->setIdDetalleProducto( $v2 ) ) {
                                    if ( $dP->setExistencia( $_POST[ $v2 ] ) ) {
                                        if ( $dP->updateDetalleProducto() ) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Existencia actualizada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Existencia ingresada incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Identificador del detalle incorrecto';
                                }
                            }
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
                break;
            case 'delete':
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