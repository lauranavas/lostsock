<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/producto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Producto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readAllProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'create':
                $_POST = $producto->validateForm( $_POST );
                if ( $producto->setNombre( $_POST[ 'nombre' ] ) ) {
                    if ( $producto->setDescripcion( $_POST[ 'descripcion' ] ) ) {
                        if ( $producto->setPrecio( $_POST[ 'precio' ] ) ) {
                            if ( $producto->setDescuento( $_POST[ 'descuento' ] ) ) {
                                if ( $producto->setIdCategoria( $_POST[ 'categoria_producto' ] ) ) {
                                    if ( $producto->setIdTipoProducto( $_POST[ 'tipo_producto' ] ) ) {
                                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                            if ($producto->setImagen($_FILES['imagen'])) {
                                                if ( $producto->createProducto() ) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto agregado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $producto->getImageError();
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione una imagen';
                                        }
                                    } else {
                                        $result['exception'] = 'Tipo seleccionado no válido';
                                    }
                                } else {
                                    $result['exception'] = 'Categoría seleccionada no válida';
                                }
                            } else {
                                $result['exception'] = 'Descuento ingresado no válido';
                            }
                        } else {
                            $result['exception'] = 'Precio ingresado no válido';
                        }
                    } else {
                        $result['exception'] = 'Descripción ingresada no válida';
                    }
                } else {
                    $result['exception'] = 'Nombres ingresados no válidos';
                }
                break;
            case 'readOne':
                if ( $producto->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ( $result[ 'dataset' ] = $producto->readProducto() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto no existente';
                    }
                } else {
                    $result['exception'] = 'Producto no válido';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm( $_POST );
                if ( $producto->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ( $data = $producto->readProducto() ) {
                        if ( $producto->setNombre( $_POST[ 'nombre' ] ) ) {
                            if ( $producto->setDescripcion( $_POST[ 'descripcion' ] ) ) {
                                if ( $producto->setPrecio( $_POST[ 'precio' ] ) ) {
                                    if ( $producto->setDescuento( $_POST[ 'descuento' ] ) ) {
                                        if ( $producto->setIdCategoria( $_POST[ 'categoria_producto' ] ) ) {
                                            if ( $producto->setIdTipoProducto( $_POST[ 'tipo_producto' ] ) ) {
                                                if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                    if ($producto->setImagen($_FILES['imagen'])) {
                                                        if ($producto->updateProducto()) {
                                                            $result['status'] = 1;
                                                            if ( $data['imagen'] == 'default.png' ) {
                                                                $result['message'] = 'Producto actualizado correctamente';
                                                            } else {
                                                                if ($producto->deleteFile($producto->getRuta(), $data['imagen'])) {
                                                                    $result['message'] = 'Producto modificado correctamente';
                                                                } else {
                                                                    $result['message'] = 'Producto actualizado pero la imagen no';
                                                                }
                                                            }
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        } 
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                    }
                                                } else {
                                                    if ( $producto->updateProducto() ) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Producto actualizado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                }
                                            } else {
                                                $result['exception'] = 'Tipo seleccionado no válido';
                                            }
                                        } else {
                                            $result['exception'] = 'Categoría seleccionada no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Descuento ingresado no válido';
                                    }
                                } else {
                                    $result['exception'] = 'Precio ingresado no válido';
                                }
                            } else {
                                $result['exception'] = 'Descripción ingresada no válida';
                            }
                        } else {
                            $result['exception'] = 'Nombres ingresados no válidos';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
                break;
            case 'delete':
                if ( $producto->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ( $data = $producto->readProducto() ) {
                        if ( $producto->deleteProducto() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Producto eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
                break;
            case 'readComentarios':
                if ( $producto->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ($result['dataset'] = $producto->readComentarios()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay comentarios sobre este producto';
                    } 
                } else {
                    $result['exception'] = 'Identificador del producto incorrecto';
                }
                break;
            case 'estadoComentario':
                if ( $producto->setEstadoComentario( $_POST[ 'estado' ] ) && $producto->setIdComentario( $_POST[ 'id' ] ) ) {
                    if ( $result[ 'dataset' ] = $producto->disableComentario() ) {
                        $result['status'] = 1;
                        $result['message'] = 'Estado actualizado correctamente';
                    } else {
                        $result['exception'] = 'No se pudo actualizar el estado';
                    }
                } else {
                    $result['exception'] = 'Estado no válido';
                }
                break;
            case 'cantidadVentas':
                if ($result['dataset'] = $producto->cantidadVentas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            case 'cantidadPedidos':
                if ($result['dataset'] = $producto->cantidadPedidos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay pedidos disponibles';
                }
                break;
            case 'cantidadSuscripciones':
                if ($result['dataset'] = $producto->cantidadSuscripciones()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay suscripciones disponibles';
                }
                break;
            case 'readTopProductos':
                if ($result['dataset'] = $producto->readTopProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
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